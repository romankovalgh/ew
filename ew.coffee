arrayWordsDictionary = ["boolean [bʊˈlɪən] – логический тип."
"integer [ˈɪntɪdʒə] – целое число."
"float [fləʊt] – плавать, число с плавающей точкой."
"string [strɪŋ] – струна, строка."
"array [əˈreɪ] – массив."
"object [ˈɒbdʒɪkt] – объект, предмет."
"resource [rɪˈsɔːs] – ресурс."
"null [nʌl] – отсутствующий, нулевой."
"true [truː] – истинный, верный."
"false [fɔːls] – ложный, неверный."
"number [ˈnʌmbə] – число, количество."
"here [hɪə] – здесь, тут."
"now [naʊ] – теперь, сейчас."
"concatenation [kənkatəˈneɪʃn] – сцепление."
"key [kiː] – ключ."
"value [ˈvæljuː] – значение."
"unset [ʌnˈsɛt] – сброс."
]

firstWordDictionary = []
i = 0
for element in arrayWordsDictionary
  positionOpeningBracket = element.indexOf '['
  firstWordDictionary[i++] = element.slice 0, positionOpeningBracket
  console.log firstWordDictionary[--i] + 'FFFF'
  

# console.log element for element in arrayWordsDictionary





