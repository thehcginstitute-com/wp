tar \
	--exclude='*.gz' \
	--exclude='*.mov' \
	--exclude='*.mp4' \
	--exclude='*.ogv' \
	--exclude='*.pdf' \
	--exclude='*.tgz' \
	--exclude='*.webm' \
	--exclude='*.zip' \
	--exclude='./.quarantine' \
	--exclude='./.tmb' \
	--exclude='./awstats-icon' \
	--exclude='./awstatsicons' \
	--exclude='./backup-storage' \
	--exclude='./cgi-bin' \
	--exclude='./icon' \
	--exclude='./stats' \
	--exclude='./store' \
	--exclude='./wp-content/ai1wm-backups/*.wpress' \
	--exclude='./wp-content/cache/autoptimize' \
	--exclude='./wp-content/cache/wp-rocket/www.thehcginstitute.com' \
	-zcvf ../${PWD##*/}-$(date '+%Y-%m-%d-%H-%M').tgz .