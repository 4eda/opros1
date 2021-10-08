<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div id="app">
  <div v-if="questionIndex === null">
    <h1>Пройди опрос</h1>
    <div>Это займет 1-2 минуты</div>
    <button @click="start">Пройти опрос</button>
  </div>
  <div v-for="(question, index) in quiz.questions">
    <div v-show="index === questionIndex">
    <h3>{{ question.text }}</h3>
    <div v-if="questionIndex === 1">
        <ol>
            <li v-for="response in question.responses">
                <label>
                    <input :type="question.type"
                    v-bind:value="question.text"
                    v-bind:name="index"
                    v-mode="userResponses[index]">
                    {{ response.text }}
                </label>
        </ol>
        </div>
              
    <div v-else-if="questionIndex === 0">
                <ol>
                    <li v-for="response in question.responses">
                    <label>
                        <input :type="question.type"
                                v-bind:value="question.text"
                                v-bind:name="index"
                                v-mode="userResponses[index]">
                                {{ response.text }}
                    </label>
    </li>
    </ol>
    </div>
    </div>
    </div>  
    <div id="container">
                    <button id="left" v-if="questionIndex > 0" v-on:click="prev">Previous</button>
                    <button id="right" v-on:click="next">Next</button>
                </div>  
</div>
 </div>

<script>
    const quiz = {
     questions: [
        {
            text: 'Предпочитаемый тип работы?',
            type: 'radio',
            id: 'one',
            responses: [
                {text: 'Люблю работать с фронтендом'}, 
                {text: 'Люблю работать с бэкендо'},
                {text: 'Другое'},
            ]
        }, {
            text: 'Предпочитаемые дни недели в качестве выходных?',
            type: 'checkbox',
            id: 'two',
            responses: [
                {text: 'Пн'}, 
                {text: 'ВТ'},
                {text: 'СР'},
                {text: 'ЧТ'},
                {text: 'ПТ'},
                {text: 'СБ'},
                {text: 'ВС'},
            ]
        }, {
            text: 'Предпочитаемый период отпуска?',
            type: 'data',
            id: 'free',
            responses: [
                {text: 'Начало'},
                {text: 'Конец'},
            ]
        }, {
            text: 'Do you like to shop?',
            type: 'number',
            id: 'foo',
            responses: [
                {text: 'Ожидаемый уровень зарплаты'},
            ]
        }, {
            text: 'Знак зодиака',
            type: 'select',
            id: 'five',
            responses: [
                {text: 'Овен'},
                {text: 'Телец'},
                {text: 'Близнецы'},
                {text: 'Рак'},
                {text: 'Лев'},
                {text: 'Дева'},
                {text: 'Скорпион'},
                {text: 'Козерог'},
                {text: 'Вололей'},
                {text: 'Рыбы'},
            ]
        }, {
            text: 'Хобби',
            type: 'textarea',
            id: 'six',
            responses: [
                
            ]
        },
        {
            text: 'Оценка данного задания',
            type: '',
            id: 'seven',
            responses: [

            ]

        }
    ]
 };

new Vue({
  el: '#app',
  data: {
    quiz,
    questionIndex: null,
    userResponses: Array(quiz.questions.length),
    answers: [],
  },
  mounted: function() {
         var vm = this;
         window.addEventListener('popstate', function(event) {
             vm.questionIndex = (event.state || {questionIndex: 0}).questionIndex;
         });
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
   next: function() {
       this.questionIndex++;
       this.updateHistory();
   },
   prev:function() {
    this.questionIndex--;
    this.updateHistory();
   },
   updateHistory: function() {
    history.pushState({questionIndex: this.questionIndex}, "Question " + this.questionIndex);
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

