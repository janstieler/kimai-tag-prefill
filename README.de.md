# Kimai Tag Prefill - "Default Tag"

[![Badge](https://forthebadge.com/api/badges/generate?primaryLabel=Lang&secondaryLabel=EN&primaryBGColor=%23555555&secondaryBGColor=%23D05A45)](https://github.com/janstieler/kimai-tag-prefill/blob/main/README.md)

Automatisches Vorauswählen des Tags "Default Tag" im Kimai Timesheet-Modal.

## Voraussetzungen

- Kimai 2.x Installation
- Das Tag "Default Tag" muss in Kimai existieren (unter Tags verwalten)

## Installation

### 1. EventSubscriber installieren

Kopiere die Datei `CustomJavascriptSubscriber.php` nach:

```
../src/EventSubscriber/CustomJavascriptSubscriber.php
```

**Wichtig:** Passe den Pfad an deine Kimai-Installation an!

Berechtigungen setzen:
```bash
chown www-data:www-data ../src/EventSubscriber/CustomJavascriptSubscriber.php
chmod 644 ../src/EventSubscriber/CustomJavascriptSubscriber.php
```

### 2. JavaScript-Datei installieren

Erstelle zuerst das Verzeichnis (falls nicht vorhanden):
```bash
mkdir -p ../public/custom
```

Kopiere die Datei `prefill-tags.js` nach:

```
../public/custom/prefill-tags.js
```

Berechtigungen setzen:
```bash
chown www-data:www-data ../public/custom/prefill-tags.js
chmod 644 ../public/custom/prefill-tags.js
```

### 3. Cache leeren

```bash
bin/console cache:clear --env=prod
```

### 4. Browser neu laden

Lade die Kimai-Seite mit einem harten Reload neu: **Strg+Shift+R**

## Anpassungen

Falls du einen **anderen Tag-Namen** verwenden möchtest, ändere in `prefill-tags.js` die Zeile:

```javascript
if (ts.options[key].text === 'Default Tag') {
```

Ersetze `'Default Tag'` mit deinem gewünschten Tag-Namen.

## Update-Sicherheit

✅ Beide Dateien sind **update-sicher**:
- `/src/EventSubscriber/` wird bei Updates nicht überschrieben
- `/public/custom/` wird bei Updates nicht überschrieben

## Deinstallation

Einfach beide Dateien löschen und Cache leeren:

```bash
rm ../src/EventSubscriber/CustomJavascriptSubscriber.php
rm ../public/custom/prefill-tags.js
cd ..
bin/console cache:clear --env=prod
```

## Lizenz

Dieses Projekt ist unter der **GNU Affero General Public License v3.0 (AGPL-3.0)** lizenziert.

Das bedeutet:
- ✅ Sie können den Code frei nutzen, ändern und verteilen
- ✅ Auch kommerzielle Nutzung ist erlaubt
- ⚠️ Änderungen müssen ebenfalls unter AGPL-3.0 veröffentlicht werden
- ⚠️ Bei Nutzung über Netzwerk muss der Quellcode bereitgestellt werden

Siehe LICENSE Datei für Details oder https://www.gnu.org/licenses/agpl-3.0.txt

## Support

Bei Problemen prüfe:
1. Existiert das Tag "Default Tag" in Kimai?
2. Sind die Dateien an den richtigen Orten?
3. Wurde der Cache geleert?
4. Browser-Cache geleert? (Strg+Shift+R)
