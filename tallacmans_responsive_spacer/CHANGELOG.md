### 2.0.2   - June 23, 2026  
- Bumped package version from 2.0.1 to 2.0.2.
--------
### 2.0.1   - June 22, 2026  
- Fixed bug: edit form fields displayed empty instead of saved values.
- Root cause: PHP variable-variable syntax $$bp['field'] was parsed as
     ${$bp}['field'] (looking up variable named "Array") instead of
     ${$bp['field']}. Fixed both the height and unit field lookups in form.php.
--------
### 2.0.0   - June 22, 2026  
- Per-breakpoint unit selection (px/rem/vw/vh/%/em per row).
- Fixed bug: xxlScreen value was overwriting xlScreen in save().
-  Fixed bug: xxlScreen form field was displaying xlScreen value.
- Fixed bug: validate() was not checking xxlScreen.
- Added xxlUnits, xlUnits, lgUnits, mdUnits, smUnits columns to db schema.
- Redesigned edit form with inline number+unit pairs per breakpoint.
-  Widened block edit dialog to 500px for better layout.


--------
### 0.9.0   - January  3, 2019  
- Initial public version
### 0.9.1   - January 14, 2019  
- Rewrite with new method
### 0.9.3   - January 15, 2019  
- Rewrite cleaner code
### 0.9.4   - January 16, 2019  
- Restored icon, more bulletproof css, number format fix in view
### 0.9.5   - January 17, 2019  
- Fixed errors and simplified view. Added block name in edit area with associated stylesheet
### 0.9.5.2 - January 18, 2019  
- Block edit mode name in translatable format
--------
### 1.0     - January 19, 2019  
- First public version, changed error message from VH to VW.
### 1.1     - January 21, 2023  
- PHP 8 compat
### 1.5.1   - September 10, 2023 
- Cleaned up code and made edit display nicer.
- Moved css to header.
- Added xxl breakpoint at 1400 per Bootstrap 5