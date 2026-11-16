# MDDocImport: do not publish ChoiceKeyboardNotice from PCs

CTTF-43: bottom ReplyKeyboard is restored by Office bot `/start` / `/buttons` on the VPS only.

Broker / Director PCs must **not** call `OmpBoardRelay.PublishChoiceButtonsAsync` / send `ChoiceKeyboardNotice` («Кнопки дошки…») in a loop (`BlueProcessMenu` 45s). That text was the spam source when tunnels flapped.

Suggested code change (MDDocImport repo):
- Gate `PublishChoiceButtonsAsync` behind an explicit Director action, or remove auto heal-resend from `BlueProcessMenu.HealBottomButtonsAsync` / `PublishFallbackMenuAsync`.
- Keep `setChatMenuButton` for blue «Процеси» on the leader (trycloudflare) as today.

Until released: closing Director stops the PC-side spam; bot `/start` restores the keyboard.
