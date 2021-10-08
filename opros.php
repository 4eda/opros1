<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <title>Опрос</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    </head>
    <body class="text-center">
        <div style="background-color:#eeeee7">
            <div class="col align-self-center mb-5 mt-5">
            <div class="row justify-content-center">
              <h1 class="h3 mt-2 mb-5 font-weight-normal">Пожалуйста заполните форму</h1>
              <div class="col col-lg">
              </div>
                <div class="col sizeMobile" >
                <div id="app">
  <div v-if="questionIndex === null">
    <h1>Пройди опрос</h1>
    <div>Это займет 1-2 минуты</div>
    <button @click="start">Пройти опрос</button>
  </div>
  <div v-else-if="question">
    <h2>{{ question.text }}</h2>
    <ol>
      <li v-for="response in question.responses">
        <label>
          <input
            :type="question.type"
            :value="response.text"
            v-model="answers[questionIndex]"
          >
          {{ response.text }}
        </label>
      </li>
    </ol>
    <div>
      <button @click="prev" :disabled="questionIndex < 1">Назад</button>
      <button @click="next" :disabled="!answerSelected">Далее</button>
    </div>
  </div>
  <div v-else-if="questionIndex === quiz.questions.length">
    <h2>Опрос успешно завершен</h2>
    <p>Результаты:</p>
    <ul>
      <li v-for="(n, i) in answers">
        <div>Вопрос: {{ quiz.questions[i].text }}</div>
        <div>Ответ: {{ n }}</div>
      </li>
    </ul>
    <button @click="reset">Сбросить результаты</button>
  </div>
</div>

        </div>
                      <div class="col col-lg">
                      </div>
                </div>
            </div>
                <hr/>
              </div>
             </div>

                </body>

<a href="Pustoi.php">aaaa</a>
       
    </body>

</html>

<script>
 const quiz = {
  questions: [
    {
      text: 'тут выбираем только один ответ',
      type: 'radio', 
      id: 'type_site',
      responses: [
        { text: 'первый' },
        { text: 'второй' },
        { text: 'третий' },
        { text: 'четвертый' },
      ],
    }, {
      text: 'тут ТОЖЕ выбираем только один ответ',
      type: 'radio',
      id: 'design',
      responses: [
        { text: 'Уникальный' },
        { text: 'Шаблонный' },
        { text: 'Рассчитать оба варианта' },
      ],
    }, {
      text: 'Здесь множественный выбор',
      type: 'checkbox',
      id: 'cart_product',
      responses: [ 
        { text: 'Выбор цвета' },
        { text: 'Рекомендации' },
        { text: 'Выбор размера' },
        { text: 'Выбрать ширину' },
      ],
    }, {
      text: 'И здесь множественный выбор',
      type: 'checkbox',
      id: 'list_product',
      responses: [
        { text: 'Вес' },
        { text: 'Рост' },
        { text: 'Ширина' },
        { text: 'Глубина' },
      ],
    },
  ],
};

new Vue({
  el: '#app',
  data: {
    quiz,
    questionIndex: null,
    answers: [],
  },
  computed: {
    question() {
      return this.quiz.questions[this.questionIndex];
    },
    answerSelected() {
      return this.answers[this.questionIndex].length;
    },
  },
  methods: {
    start() {
      this.questionIndex = 0;
    },
    next() {
      if (this.answerSelected) {
        this.questionIndex++;
      }
    },
    prev() {
      this.questionIndex--;
    },
    reset() {
      this.questionIndex = null;
      this.answers = this.quiz.questions.map(n => n.type === 'radio' ? '' : []);
    },
  },
  created() {
    this.reset();
  }
});
</script>