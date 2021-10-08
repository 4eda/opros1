<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Опрос</title>
  <script src="https://unpkg.com/vue"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script>
  window.onload = survey;
function survey(){
 var survey = {
    title: 'Здравствуйте, это мини опрос. Он не займет много времени',
    questions: [
        {
            text: "Предпочитаемый тип работы?",
            type: "radio",
            id: "one",
            responses: [
                {text: 'Люблю работать с фронтендом'}, 
                {text: 'Люблю работать с бэкендо'},
                {text: 'Другое'},
            ]
        }, {
            text: "Предпочитаемые дни недели в качестве выходных?",
            type: "checkbox",
            id: "two",
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
            text: "Предпочитаемый период отпуска?",
            type: "data",
            id: "free",
            responses: [
                {text: 'Начало'},
                {text: 'Конец'},
            ]
        }, {
            text: "Do you like to shop?",
            type: "number",
            id: "foo",
            responses: [
                {text: 'Ожидаемый уровень зарплаты'},
            ]
        }, {
            text: "Знак зодиака",
            type: "select",
            id: "five",
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
            text: "Хобби",
            type: "textarea",
            id: "six",
            responses: [
                
            ]
        },
        {
            text: "Оценка данного задания",
            type: "",
            id: "seven",
            responses: [
                
            ]

        }
    ]
 };

 new Vue({
     el: '#app',
     data: { 
         survey: survey,
         questionIndex: 0,
         userResponses: Array(survey.questions.length),
         question4: Array(5),
         question5: Array(9),
     },
     mounted: function() {
         var vm = this;
         window.addEventListener('popstate', function(event) {
             vm.questionIndex = (event.state || {questionIndex: 0}).questionIndex;
         });
     },
     methods: {
         next: function() {
             this.questionIndex++;
             this.updateHistory();
         },
         prev: function() {
             this.questionIndex--;
             this.updateHistory();
         },
         updateHistory: function() {
             history.pushState({questionIndex: this.questionIndex}, "Question " + this.questionIndex);
         }
     }
 });
}
  </script>
</head>
<body class="text-center">
    <div id="app">
    <div style="background-color:#eeeee7">
            <div class="col align-self-center mb-5 mt-5">
            <div class="row justify-content-center">
              <h1 class="h3 mt-2 mb-3 font-weight-normal">{{ survey.title }}</h1>
              <div class="col col-lg">
              </div>
                <div class="col sizeMobile" >

        <div id="survey" v-for="(question, index) in survey.questions">

            <div v-show="index === questionIndex">
                <h3 class="mt-2 mb-3 ">{{ question.text }}</h3>
                <div v-if="questionIndex === 2">
                    <input class="form-control" type="text" v-model="userResponses[2]" placeholder="Please enter your location:"> 
                </div>
                <div v-else-if="questionIndex === 4">
                    <select v-model="question4" multiple>
                        <option v-for="response in question.responses"> {{ response.text }} </option></select>
                </div>
                <div v-else-if="questionIndex === 5">
                    <select class="form-control" v-model="question5" multiple>
                        <option v-for="response in question.responses"> {{ response.text }} </option></select>
                </div>
                <div v-else>
                    <ol>
                        <li v-for="response in question.responses">
                            <label style="font-size:15" class="form-check-label mb-3">
                                <input class="form-check-input" 
                                :type="question.type" 
                                v-bind:value="response" 
                                v-bind:name="index" 
                                v-model="userResponses[index]"> {{ response.text }}
                            </label>
                        </li>
                    </ol>
                </div>
                <div id="container">
                    <button class="btn btn-danger ml-5" id="left" v-if="questionIndex > 0" v-on:click="prev">Назад</button>
                    <button class="btn btn-success" id="right" v-on:click="next">Далее</button>
                </div>
            </div>
            
    </div>
    
    </div>
    <div class="col col-lg">
              </div>
        </div>
        </div>
        </div>