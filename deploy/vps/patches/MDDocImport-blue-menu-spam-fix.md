# MDDocImport: stop board-button spam + keep menu «Процеси»

Windows `BlueProcessMenu` (45s) + `OmpBoardRelay.PublishChoiceButtonsAsync` caused:
1. Spam of `ChoiceKeyboardNotice` («Кнопки дошки…»)
2. `setChatMenuButton` text wrongly set to «МДдок імпорт» in `PublishFallbackMenuAsync`

## Live VPS mitigation (already deployed)
- Menu guard cron: force `setChatMenuButton` text «Процеси» → `/md-access/brokers?t=…`
- Webhook `/start`: restores menu + ReplyKeyboardMarkup (do **not** `deleteMessage` after keyboard send — that wipes the keyboard)
- «Процеси» / «Процеси · OMP» web_app URL = **brokers** board (not `/board` customs)

## Code fixes to apply in MDDocImport (this env cannot push that repo)

### `BlueProcessMenu.PublishFallbackMenuAsync`
Use `ButtonText` («Процеси»), never `OmpBoardRelay.MdDocImportButtonText`:

```csharp
if (await PublishAsync(bot, chat, fallback, ButtonText, ct).ConfigureAwait(false))
```

### `OmpBoardRelay.PublishChoiceButtonsAsync` / `SendChoiceKeyboardAsync`
Rate-limit identical `ChoiceKeyboardNotice` (e.g. ≥ 6h), or skip notice when markup stamp already matches and only menu URL changed.

### When already on brokers fallback
Do not `MarkChoiceKeyboardHidden` + re-publish choice keyboard every 45s.
