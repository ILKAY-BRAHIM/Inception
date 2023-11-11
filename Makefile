NAME = inception

CREATE_DIRS = bash srcs/requirements/tools/set.sh

all:
	$(CREATE_DIRS)
	cd srcs && docker compose up 

clean:
	@echo "Removing containers..."
	@cd srcs && docker compose down

fclean: clean
	@echo "Full cleaning..."
	@sudo rm -rf /home/bchifour/data
	@docker volume rm -f srcs_data_mariadb  srcs_data_word
	@docker  system  prune -af

re: fclean all

.PHONY: build all re clean fclean