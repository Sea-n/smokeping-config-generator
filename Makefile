all:
	php generator.php > Targets
	service smokeping reload
	git add config.php Targets
	git commit -m 'Update Targets'

init:
	test -s Targets && mv Targets Targets.bak || true
	test -s .git || ( \
		git init; \
		git add --all; \
		git commit -m 'init'; \
	)
