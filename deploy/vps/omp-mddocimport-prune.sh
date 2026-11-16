#!/bin/bash
# Keep only current MDDocImport download artifacts (no version history pile).
set -euo pipefail
DIR="${OMP_DOWNLOAD_DIR:-/var/www/downloads/mddocimport}"
LATEST="$DIR/latest.json"
if [[ ! -f "$LATEST" ]]; then
  echo "omp-mddocimport-prune: missing $LATEST" >&2
  exit 1
fi

mapfile -t KEEP < <(python3 - "$LATEST" <<'PY'
import json, sys, os
from urllib.parse import urlparse, unquote
path = sys.argv[1]
data = json.load(open(path, encoding="utf-8"))
keep = {"latest.json", ".gitkeep", "README.md"}
def add(name):
    if not name:
        return
    name = unquote(str(name)).split("?")[0].strip()
    if not name:
        return
    if "://" in name:
        name = os.path.basename(urlparse(name).path)
    else:
        name = os.path.basename(name)
    if name:
        keep.add(name)
add(data.get("file"))
add(data.get("zipFile"))
add(data.get("directorZipFile"))
add(data.get("clientZipFile"))
add(data.get("clientSetupFile"))
for key in (
    "versionedUrl", "latestUrl", "zipUrl", "directorZipUrl",
    "clientZipUrl", "clientSetupUrl", "clientVersionedSetupUrl",
):
    add(data.get(key))
keep.update({
    "MDDocImport-Setup.exe",
    "MDDocImport.Client-Setup.exe",
})
for n in sorted(keep):
    print(n)
PY
)

declare -A KEEP_MAP=()
for n in "${KEEP[@]}"; do
  KEEP_MAP["$n"]=1
done

deleted=0
kept=0
shopt -s nullglob
for path in "$DIR"/*; do
  base=$(basename "$path")
  if [[ -n "${KEEP_MAP[$base]+x}" ]]; then
    kept=$((kept + 1))
    continue
  fi
  if [[ -f "$path" && "$base" =~ ^MDDocImport ]]; then
    rm -f -- "$path"
    echo "deleted $base"
    deleted=$((deleted + 1))
  fi
done
echo "omp-mddocimport-prune: kept=$kept deleted=$deleted dir=$DIR"
