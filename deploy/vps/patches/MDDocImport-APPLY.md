# Apply on MDDocImport (this agent could not push that private repo)

## 1. `scripts/publish-omp-download.ps1`

Apply `publish-omp-download.ps1.patch` (or manually):

1. Update `.DESCRIPTION` host IP to `185.251.25.179` and note host-nginx `/downloads/` (no container mount).
2. After the post-upload `chmod` SSH, call:

```powershell
Write-Host "Pruning previous MDDocImport downloads (keep latest only)..." -ForegroundColor Cyan
ssh -o BatchMode=yes $cfg.SshHost "/usr/local/bin/omp-mddocimport-prune.sh"
if ($LASTEXITCODE -ne 0) {
    Write-Host "WARNING: prune failed on $($cfg.SshHost) (uploads already published)" -ForegroundColor Yellow
}
```

## 2. `github.env.example`

Replace the omp-prod comment block HostName:

```
# ~/.ssh/config: Host omp-prod, HostName 185.251.25.179, User ubuntu, IdentityFile ~/.ssh/id_taxi_prod
```

## 3. `scripts/test-publish-version.ps1`

Add assertions:

```powershell
if ($ompUpload -notmatch 'omp-mddocimport-prune\.sh') {
    Write-Host "[FAIL] publish-omp-download.ps1 must prune previous downloads after upload" -ForegroundColor Red
    exit 1
}
if ($ompUpload -notmatch '185\.251\.25\.179|keep latest only') {
    Write-Host "[FAIL] publish-omp-download.ps1 must document new omp VPS / keep-latest prune" -ForegroundColor Red
    exit 1
}
```

## 4. Windows SSH

`omp-prod` must point at `185.251.25.179` with key auth for `ubuntu` (BatchMode). Root password auth is temporary — rotate after keys are installed.
