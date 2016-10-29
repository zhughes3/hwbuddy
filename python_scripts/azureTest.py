#! python
# Simple program that demonstrates how to invoke Azure ML Text Analytics API: key phrases, language and sentiment detection.
import urllib2
import urllib
import sys
import base64
import json

# Azure portal URL.
batch_keyphrase_url = 'https://westus.api.cognitive.microsoft.com/text/analytics/v2.0/keyPhrases'
# Your account key goes here.
account_key = '131abaeea46044b6bdd9a010b9eca3f3'

headers = {'Content-Type':'application/json', 'Ocp-Apim-Subscription-Key':account_key}
            
input_texts = '{"documents":[{"id":"1","text":"hello world"},{"id":"2","text":"hello foo world"},{"id":"three","text":"hello my world"},]}'

num_detect_langs = 1;

# Detect key phrases.
req = urllib2.Request(batch_keyphrase_url, input_texts, headers) 
response = urllib2.urlopen(req)
result = response.read()
obj = json.loads(result)
for keyphrase_analysis in obj['documents']:
    print('Key phrases ' + str(keyphrase_analysis['id']) + ': ' + ', '.join(map(str,keyphrase_analysis['keyPhrases'])))