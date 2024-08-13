OUT = index.html

all : index.php
	php index.php > $(OUT)

clean :
	rm index.html

.PHONY:
	all clean
