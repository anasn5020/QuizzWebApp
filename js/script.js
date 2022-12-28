const Quizz = [
    {
  question : "What is the full form of HTML?",
  a : "Hello To My Language",
  b : "Hey text Markup Language",
  c : "Hyper Text Markup Language",
  d : "Hello To Markup Language",
  ans : "ans3"  
},
{
    question : "What is the full form of CSS?",
    a : "Cascyding Style Sheets",
    b : "Cartoon Style Sheets",
    c : "Cool Style Ships",
    d : "Copper Style Sheets",
    ans : "ans1"  
  },
  {
    question : "What is the full form of JS?",
    a : "JavaScript",
    b : "Javasupper",
    c : "JustScript",
    d : "JavaSoon",
    ans : "ans1"  
  },
  {
    question : "What is the full form of HTTP?",
    a : "Hello Transfer To Protocol",
    b : "Hyper Text Transfer Protocol",
    c : "Hyper Text To Pool",
    d : "Hello transfer",
    ans : "ans2"  
  }
];
const question = document.querySelector('.question');
const option1 = document.querySelector('#option1');
const option2 = document.querySelector('#option2');
const option3 = document.querySelector('#option3');
const option4 = document.querySelector('#option4');
const submit = document.querySelector('#submit');

const answers = document.querySelectorAll('.answer');

const showscore = document.querySelector('#showscore');


let questionCount = 0;
let score  = 0;


const loadQuestion = ()=>{
    const questionList = Quizz[questionCount];
    question.innerHTML = questionList.question;
    option1.innerHTML = questionList.a;
    option2.innerHTML = questionList.b;
    option3.innerHTML = questionList.c;
    option4.innerHTML = questionList.d;
};
loadQuestion();

const getcheckAnswer = (curAnsElem) => {
    let answer;
    answers.forEach((curAnsElem) => {
        if(curAnsElem.checked){
            answer = curAnsElem.id;
        }
    });
    return answer;
};

submit.addEventListener('click', ()=>{
    const checkedAnswer = getcheckAnswer();
    console.log(checkedAnswer);
    if(checkedAnswer == Quizz[questionCount].ans){
        score++;
    };
    questionCount++;
    if(questionCount<Quizz.length){
        loadQuestion();
    }
    else{
showscore.innerHTML = `
<h3 id="score-img">You Scored ${score}/${Quizz.length}</h3>
<button class="hidden-btn" onclick="location.reload()">Ok</button>
`
    }
})