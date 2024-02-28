find . -empty -type d \
	-not -path '*/.git/*' \
	-not -path './_my/*' \
	-delete
find . -iname '*-*old' -type f -delete
find . -iname '*-back' -type f -delete
find . -iname '*-bkp' -type f -delete
find . -iname '*-bkp.*' -type f -delete
find . -iname '*-disable' -type f -delete
find . -iname '*-old' -type d -exec rm -rf {} \;
find . -iname '*-old' -type f -delete
find . -iname '*-org' -type f -delete
find . -iname '*.*bak' -type f -delete
find . -iname '*.back' -type f -delete
find . -iname '*.backup' -type f -delete
find . -iname '*.bak' -type f -delete
find . -iname '*.bak.*' -type f -delete
find . -iname '*=' -type f -delete
find . -iname '*_old' -type d -exec rm -rf {} \;
find . -iname 'broken' -type d -exec rm -rf {} \;
find . -name '*,' -type f -delete
find . -name '*~' -type f -delete
find . -name '._*' -type f -delete
find . -name '[' -type f -delete
find . -iname '*.bk' -type f -delete
find . -iname '*.bkp' -type f -delete
find . -iname '*.modified' -type f -delete
find . -iname '*.old' -type f -delete
find . -iname '*.org' -type f -delete
find . -iname '*.orig' -type f -delete
find . -iname '*.original' -type f -delete
find . -iname '*.original.*' -type f -delete
find . -iname '*_original.*' -type f -delete
find . -iname '*.phtml?*' -type f -delete
find . -iname '*.sav' -type f -delete
find . -iname '*.save' -type f -delete
find . -iname '*.test' -type f -delete
find . -iname '*.xml.before' -type f -delete
find . -iname '*=bkp' -type f -delete
find . -iname '*_copy' -type f -delete
find . -iregex '.*/[0-9]' -type f -delete
find . -iregex '.*\.[x]+' -delete
find . -iname '*_' -type d \
	-not -path './store/media/catalog/product/*' \
	-exec rm -rf {} \;
find . -iname '*--*' -type f \
	-not -path './store/var/cache/*' \
	-not -path './wp-content/uploads/*' \
	-delete
find . -iname '*-' \
	-not -path './store/media/catalog/product/*' \
	-not -path './wp-content/plugins/wp-post-author-' \
	-exec rm -rf {} \;
find . -iname '*_bak.*' -type f -delete
find . -iname '*_new' -type f -delete
find . -iname '*_original' -type f -delete
find . -iname '*_prev' -type f -delete
find . -iname '*_prev.css' -type f -delete
find . -iname '*bak' -type d -exec rm -rf {} \;
find . -iname '.DS_Store' -type f -delete
find . -iname '_*' -type d \
	-not -path './_my' \
	-not -path './store/media/catalog/product/*' \
	-not -path './wp-content/plugins/wp-smushit/_src' \
	-exec rm -rf {} \;
find . -iname '.*' -type d \
	-not -path '*/.*ci' \
	-not -path '*/.cache' \
	-not -path '*/.config' \
	-not -path '*/.dot_directory' \
	-not -path '*/.easymin' \
	-not -path '*/.git*' \
	-not -path '*/.platform' \
	-not -path '*/.psalm' \
	-not -path '*/.scenarios.lock*' \
	-not -path '*/.well-known' \
	-not -path '*/vendor/symfony/finder/Tests/Fixtures/.dot' \
	-not -path './.tmb' \
	-not -path './store/media/wysiwyg/.thumbs' \
	-exec rm -rf {} \;
find . -iname 'Thumbs.db' -type f -delete
find . -iname 'error_log' -type f -delete
find . -iname 'vssver2.scc' -type f -delete
find . -iname __MACOSX -exec rm -rf {} \;
ext='\(bak\|css\|js\|json\|html\|inc\|less\|php\|phtml\|txt\|xml\)'
ext1='\(bak\|css\|js\|json\|html\|inc\|less\|php\|phtml\|xml\)'
ext2='\(bak\|css\|js\|json\|html\|inc\|php\|phtml\|xml\)'
find . -iregex '.*[-_]+[0-9][0-9][0-9\._-]+\.'$ext1'$' -type f \
	-not -path '*/Zend/Locale/Data/*' \
	-not -path '*/data/*_setup/*' \
	-not -path '*/sql/*_setup/*' \
	-not -path './stats/usage_*.html' \
	-not -path './wp-content/plugins/all-in-one-seo-pack/dist/Lite/assets/*' \
	-not -path './wp-content/plugins/lifterlms1/includes/functions/updates/*' \
	-not -path './wp-content/plugins/redirection/*' \
	-not -path './wp-content/plugins/wordpress-seo/css/dist/*' \
	-not -path './wp-content/plugins/wordpress-seo/src/*' \
	-not -path './wp-includes/theme-compat/embed-404.php' \
	-delete
find . -iregex '.*[-_]+[0-9][0-9][0-9\._-]+\-\w+\.'$ext1'$' -type f \
	-not -path './wp-content/plugins/wordpress-seo/css/dist/*' \
	-delete
find . -iregex '.*/_[^/]+\.'$ext2'$' -type f \
	-not -path './wp-content/plugins/all-in-one-seo-pack/dist/Lite/assets/js/*' \
	-not -path './wp-content/plugins/formidable/classes/views/*' \
	-not -path './wp-content/plugins/formidable/css/_single_theme.css.php' \
	-not -path './wp-content/plugins/js_composer/include/templates/*' \
	-not -path './wp-content/plugins/lifterlms1/assets/js/*' \
	-not -path './wp-content/themes/apicona/inc/phpquery/phpQuery/plugins/Scripts/__config.example.php' \
	-delete
find . -iregex '.*/[^/]+_\.'$ext'$' -type f -delete
find . -iregex '.*[_\.]backup\.'$ext'$' -type f -delete
find . -iregex '.*[_\.]bkp\.'$ext'$' -type f -delete
find . -iregex '.*[_\.]old\.'$ext'$' -type f -delete
find . -iregex '.*[_\.]orig\.'$ext'$' -type f -delete
find . -iregex '.*\.'$ext'(.*' -type f -delete
find . -iregex '.*\.'$ext'*[0-9\._-]+$' -type f -delete
find . -iregex '.*\.'$ext'[_\.-]backup$' -type f -delete
find . -iregex '.*\.'$ext'\.swp$' -type f -delete
find . -iregex '.+[^/]+\.[^/\.]*[-_]+[^/\.]*$' -type f \
	-not -path './wp-content/cache/wp-rocket/*' \
	-delete