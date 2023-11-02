FROM        debian:bookworm
RUN         apt update && apt upgrade -y; apt install git ; apt install npm -y;
COPY        ./set.sh set_portfolio.sh
COPY        ./app.js app.js

ENTRYPOINT  [ "bash", "set_portfolio.sh" ]
CMD         [ "node", "app.js" ]