FROM        debian:bookworm
RUN         apt update && apt upgrade -y; apt install git ; apt install npm -y;
# RUN         npx -y create-react-app my-app;
COPY        ./set.sh set_portfolio.sh
COPY        ./app.js app.js

ENTRYPOINT  [ "bash", "set_portfolio.sh" ]
CMD         [ "node", "app.js" ]