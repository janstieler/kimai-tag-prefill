document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('shown.bs.modal', function(event) {
        const modal = event.target;
        
        setTimeout(function() {
            const tagSelect = modal.querySelector('#timesheet_edit_form_tags');
            
            if (!tagSelect) {
                return;
            }
            
            function setTag(attempts = 0) {
                if (tagSelect.tomselect) {
                    const ts = tagSelect.tomselect;
                    
                    // Suche nach "Nicht abgerechnet"
                    let tagId = null;
                    for (let key in ts.options) {
                        if (ts.options[key].text === 'Nicht abgerechnet') {
                            tagId = key;
                            break;
                        }
                    }
                    
                    if (tagId) {
                        ts.addItem(tagId, true);
                        ts.sync();
                    }
                    
                } else if (attempts < 10) {
                    setTimeout(() => setTag(attempts + 1), 200);
                }
            }
            
            setTag();
        }, 500);
    });
});
