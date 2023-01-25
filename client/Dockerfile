FROM node:16-alpine

WORKDIR /client

COPY package.json .

COPY package-lock.json .

RUN npm install --silent

COPY . .

EXPOSE 3000

CMD ["npm", "run", "dev"]
