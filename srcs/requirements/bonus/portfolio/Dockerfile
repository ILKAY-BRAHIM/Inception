FROM        debian:bookworm
RUN         apt update && apt upgrade -y; apt install git ; apt install npm -y;
EXPOSE      3000 
COPY        ./tools/set.sh set_portfolio.sh
COPY        ./conf/app.js app.js

ENTRYPOINT  [ "/set_portfolio.sh" ]
CMD         [ "node", "app.js" ]
