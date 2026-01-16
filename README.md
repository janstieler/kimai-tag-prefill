# Kimai Tag Prefill - "Default Tag"

[![Badge](https://forthebadge.com/api/badges/generate?primaryLabel=Sprache&secondaryLabel=DE&primaryBGColor=%23555555&secondaryBGColor=%23D2AA26)](https://github.com/janstieler/kimai-tag-prefill/blob/main/README.de.md)

Automatically pre-select the "Default Tag" tag in the Kimai timesheet modal.

## Prerequisites

- Kimai 2.x installation
- The tag "Default Tag" must exist in Kimai (under tag management)

## Installation

### 1. Install EventSubscriber

Copy the file `CustomJavascriptSubscriber.php` to:

```
sudo -u www-data mkdir -p src/EventSubscriber
sudo -u www-data wget -O src/EventSubscriber/CustomJavascriptSubscriber.php \
  https://raw.githubusercontent.com/janstieler/kimai-tag-prefill/main/CustomJavascriptSubscriber.php
```

**Important:** Adjust the path to match your Kimai installation!

Set permissions:
```bash
chown www-data:www-data ../src/EventSubscriber/CustomJavascriptSubscriber.php
chmod 644 ../src/EventSubscriber/CustomJavascriptSubscriber.php
```

### 2. Install JavaScript file

First create the directory (if it doesn't exist):
```bash
sudo -u www-data mkdir -p public/custom
sudo -u www-data wget -O public/custom/prefill-tags.js \
  https://raw.githubusercontent.com/janstieler/kimai-tag-prefill/main/prefill-tags.js
```

Copy the file `prefill-tags.js` to:

```
../public/custom/prefill-tags.js
```

Set permissions:
```bash
chown www-data:www-data ../public/custom/prefill-tags.js
chmod 644 ../public/custom/prefill-tags.js
```

### 3. Clear cache

```bash
bin/console cache:clear --env=prod
bin/console cache:warmup --env=prod
```

### 4. Reload browser

Reload the Kimai page with a hard refresh: **Ctrl+Shift+R**

## Customization

If you want to use a **different tag name**, change this line in `prefill-tags.js`:

```javascript
if (ts.options[key].text === 'Default Tag') {
```

Replace `'Default Tag'` with your desired tag name.

## Update Safety

✅ Both files are **update-safe**:
- `/src/EventSubscriber/` will not be overwritten during updates
- `/public/custom/` will not be overwritten during updates

## Uninstallation

Simply delete both files and clear the cache:

```bash
rm ../src/EventSubscriber/CustomJavascriptSubscriber.php
rm ../public/custom/prefill-tags.js
cd ..
bin/console cache:clear --env=prod
```

## License

This project is licensed under the **GNU Affero General Public License v3.0 (AGPL-3.0)**.

This means:
- ✅ You can freely use, modify, and distribute the code
- ✅ Commercial use is allowed
- ⚠️ Modifications must also be published under AGPL-3.0
- ⚠️ When used over a network, source code must be made available

See the LICENSE file for details or https://www.gnu.org/licenses/agpl-3.0.txt

## Support

If you encounter problems, check:
1. Does the tag "Default Tag" exist in Kimai?
2. Are the files in the correct locations?
3. Was the cache cleared?
4. Browser cache cleared? (Ctrl+Shift+R)
