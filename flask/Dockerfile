FROM python:2.7

WORKDIR /usr/src/app

COPY api_functions.py ./
COPY requirements.txt ./
RUN pip install -r requirements.txt

COPY . .

CMD [ "python", "./api_functions.py" ]