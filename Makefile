OUT = index.html
FILENAME = lorem.txt

all : index.php
	php index.php $(FILENAME) > $(OUT)

clean :
	rm index.html

.PHONY:
	all clean
