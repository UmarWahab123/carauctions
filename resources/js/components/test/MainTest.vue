<template>
  <div>
    <div class="samebox container-fluid" v-if="this.showClose == 1">
      <h2 class="msgheading">{{ translations.leave_headline }}</h2>
      <div class="text mb-5 msgtext">
        {{ translations.leave_text }}
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-3 col-xl-12 col-12">
          <a
            v-on:click="resumetest"
            href="javascript::void(0)"
            class="btnblue"
            >{{ translations.resume_button }}</a
          >
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12 col-12 col-xl-12 leavediv">
          <a href="/" class="btnleave">{{ translations.leave_button }}</a>
        </div>
      </div>
    </div>
    <same-alert :showSame="this.showSame" :translations="this.translations" />
    <div class="loaderdiv" v-if="this.loader == 1">
      <img
        src="https://personalitypath.com/wp-content/uploads/2020/05/load-spinner.svg"
      />
    </div>

    <div id="main-wrapper" class="main-container 11" v-if="this.loader == 0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-9">
            <img
              class="topleftimg"
              src="https://nutrafunnels.com/wp-content/uploads/elementor/thumbs/cropped-logo-owv4yx3yxr0ts76bag9n5qdwuqo2prpg7x50b2tmh4.png"
            />
          </div>
          <div class="col-md-6 col-3">
            <div v-on:click="closetest" class="pull-right mt-4">
              <img class="btnclose" src="/svg/close.svg" />
            </div>
          </div>
        </div>
      </div>

      <div class="test-wrapper">
        <div id="questionboxB" class="container" v-if="this.showSection == 1">
          <!-- Type B -->
          <div
            class="questionBwrapper"
            v-if="this.stage == 3 && this.status == 1"
          >
            <div class="subwrapper">
              <div class="questionB-back">
                <div class="back-button" v-if="this.previous == 1">
                  <div class="previcon">
                    <img
                      v-on:click="previousquestion"
                      class="leftarrow pull-right"
                      src="/test/public/svg/arrow-left.svg"
                    />
                  </div>
                  <div class="back-text" v-on:click="previousquestion">
                    Back
                  </div>
                </div>
              </div>

              <div class="typeB-container">
                <div class="typebheadline optheading">
                  <p class="mb-0">{{ translations.questionB_headline }}</p>
                  <p>{{ translations.questionB_text }}</p>
                </div>
                <div class="questionb-wrapper">
                  <div class="typeb-radio">
                    <svg
                      class="svg-circle"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      version="1.1"
                      viewBox="0 0 60 60"
                      preserveAspectRatio="none"
                    >
                      <circle
                        class="circle"
                        cx="30"
                        cy="30"
                        r="28"
                        id="green-halo"
                        fill="none"
                        stroke="#d4b6a6"
                        stroke-width="3"
                        stroke-dasharray="0,200"
                        transform=""
                      />
                    </svg>
                    <div
                      v-on:click="sendresponse"
                      :id="this.fields.statement_a_pid"
                      class="faux-radio lrg"
                      data-val="3"
                    ></div>
                  </div>
                  <div class="questionb-text qb1">
                    {{ questiondata.statement_a_text }}
                  </div>
                </div>
                <div class="questionb-wrapper mb-0">
                  <div class="typeb-radio">
                    <svg
                      class="svg-circle"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      version="1.1"
                      viewBox="0 0 60 60"
                      preserveAspectRatio="none"
                    >
                      <circle
                        class="circle"
                        cx="30"
                        cy="30"
                        r="28"
                        id="green-halo"
                        fill="none"
                        stroke="#d4b6a6"
                        stroke-width="3"
                        stroke-dasharray="0,200"
                        transform=""
                      />
                    </svg>
                    <div
                      v-on:click="sendresponse"
                      :id="this.fields.statement_b_pid"
                      class="faux-radio lrg"
                      data-val="3"
                    ></div>
                  </div>
                  <div class="questionb-text qb2">
                    {{ questiondata.statement_b_text }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END Type B -->
        <div
          id="questionbox"
          class="container-fluid"
          v-if="this.showSection == 1"
        >
          <!-- Type A -->
          <div
            class=""
            v-if="(this.stage == 1 || this.stage == 2) && this.status == 1"
          >
            <div class="questionAdiv">
              <div class="back-button">
                <div class="backwrapper" v-if="this.previous == 1">
                  <div class="previcon">
                    <img
                      v-on:click="previousquestion"
                      class="leftarrow pull-right"
                      src="/svg/arrow-left.svg"
                    />
                  </div>
                  <div class="back-text" v-on:click="previousquestion">
                    Back
                  </div>
                </div>
              </div>
              <div class="questionwrapper">
                <h3 class="question">{{ this.questiondata.question }}</h3>
              </div>
            </div>
            <div class="row justify-content-center radio-row">
              <input type="hidden" name="rank" value="1" />
              <div
                class="
                  col-md-2 col-sm-3 col-lg-2 col-xl-2 col-3
                  pl-0
                  pr-0
                  ml-0
                  mr-0
                "
              >
                <div class="form-group m-form__group mb-4">
                  <svg
                    class="svg-circle"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1"
                    viewBox="0 0 60 60"
                    preserveAspectRatio="none"
                  >
                    <circle
                      class="circle"
                      cx="30"
                      cy="30"
                      r="28"
                      id="green-halo"
                      fill="none"
                      stroke="#d4b6a6"
                      stroke-width="3"
                      stroke-dasharray="0,500"
                      transform=""
                    />
                  </svg>
                  <div
                    v-on:click="sendresponse"
                    data-val="0"
                    class="faux-radio lrg"
                  ></div>
                </div>
                <div class="optheading">
                  <p class="mb-0">{{ translations.strongly_disagree1 }}</p>
                </div>
              </div>
              <div
                class="
                  col-md-2 col-sm-3 col-lg-2 col-xl-2 col-3
                  pl-0
                  pr-0
                  ml-0
                  mr-0
                "
              >
                <div class="form-group m-form__group mb-4">
                  <svg
                    class="svg-circle"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1"
                    viewBox="0 0 60 60"
                    preserveAspectRatio="none"
                  >
                    <circle
                      class="circle"
                      cx="30"
                      cy="30"
                      r="28"
                      id="green-halo"
                      fill="none"
                      stroke="#d4b6a6"
                      stroke-width="3"
                      stroke-dasharray="0,500"
                      transform=""
                    />
                  </svg>
                  <div
                    v-on:click="sendresponse"
                    class="faux-radio lrg"
                    data-val="1"
                  ></div>
                </div>
                <div class="optheading">
                  <p class="mb-0">{{ translations.slightly_disagree1 }}</p>
                </div>
              </div>
              <div
                class="
                  col-md-2 col-sm-3 col-lg-2 col-xl-2 col-3
                  pl-0
                  pr-0
                  ml-0
                  mr-0
                "
              >
                <div class="form-group m-form__group mb-4">
                  <svg
                    class="svg-circle"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1"
                    viewBox="0 0 60 60"
                    preserveAspectRatio="none"
                  >
                    <circle
                      class="circle"
                      cx="30"
                      cy="30"
                      r="28"
                      id="green-halo"
                      fill="none"
                      stroke="#d4b6a6"
                      stroke-width="3"
                      stroke-dasharray="0,500"
                      transform=""
                    />
                  </svg>
                  <div
                    v-on:click="sendresponse"
                    class="faux-radio lrg"
                    data-val="2"
                  ></div>
                </div>
                <div class="optheading">
                  <p class="mb-0">{{ translations.slightly_agree1 }}</p>
                </div>
              </div>
              <div
                class="
                  col-md-2 col-sm-3 col-lg-2 col-xl-2 col-3
                  pl-0
                  pr-0
                  ml-0
                  mr-0
                "
              >
                <div class="form-group m-form__group mb-4">
                  <svg
                    class="svg-circle"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1"
                    viewBox="0 0 60 60"
                    preserveAspectRatio="none"
                  >
                    <circle
                      class="circle"
                      cx="30"
                      cy="30"
                      r="28"
                      id="green-halo"
                      fill="none"
                      stroke="#d4b6a6"
                      stroke-width="3"
                      stroke-dasharray="0,500"
                      transform=""
                    />
                  </svg>
                  <div
                    v-on:click="sendresponse"
                    class="faux-radio lrg"
                    data-val="3"
                  ></div>
                </div>
                <div class="optheading">
                  <p class="mb-0">{{ translations.strongly_agree1 }}</p>
                </div>
              </div>
            </div>
          </div>
          <!--END Type A -->
        </div>
      </div>
      <div class="footerbar">
        <p class="progress-text">{{ this.progresscount }}%</p>
        <div class="progress mt-5">
          <div class="progress-bar"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import FirstQuestion from "../../api/firststage";
import SameAlert from "./partials/SameAlert.vue";
import CloseAlert from "./partials/CloseAlert.vue";
import SvgTag from "./partials/SvgTag.vue";
import ProgressBar from "./partials/ProgressBar.vue";
import Response from "../../api/questionresponse";
// import VueSimpleAlert from "vue-simple-alert";
// Vue.use(VueSimpleAlert);
export default {
  name: "ApplicationTile",

  components: {
    SameAlert,
    SvgTag,
    ProgressBar,
    CloseAlert,
  },
  data() {
    return {
      message: "",
      lang_id: 1,
      tempData: 1,
      status: 1,
      loader: 0,
      progresscount: 0,
      loadercount: 0,
      qcounter: 0,
      counter: 0,
      showSame: 0,
      showClose: 0,
      showSection: 1,
      stage: 1,
      round: 1,
      previous: 0,
      responseObj: {},
      userresponses: [],
      allAnswers: [],
      attempted: [],
      questiondata: [],
      translations: [],
      previousData: [],
      fields: {
        meansBefore3: [],
        lang_id: 1,
        sdBefore3: [],
        excludedRound: [],
        discard: [],
        userResults: [],
        typeBcount: 0,
        p1: 0,
        p2: 0,
        round: 0,
        counter: 0,
        rank: "",
        question_id: "",
        question: "",
        is_reverse: "",
        personality_id: "",
        statement_a_pid: "",
        statement_b_pid: "",
        statement_a_text: "",
        statement_b_text: "",
        answer: "",
        attempted: "",
        dpArray: "",
        allAnswers: "",
        userresponses: "",
        progresscount: "",
        stage: 1,
        type: "",
      },
    };
  },
  mounted() {
    // Vue.set(this.responseObj, "type", 1);
    // this.lang_id = document.querySelector(".lang_id").value;
    this.lang_id = 1;
    FirstQuestion.getfirstquestion(this.lang_id)
      .then((response) => {
        this.questiondata = response.data.response;
        this.translations = response.data.translations;
        //console.log(this.questiondata.question);
        this.fields.rank = this.questiondata.rank;
        this.fields.question_id = this.questiondata.id;
        this.fields.question = this.questiondata.question;
        this.fields.personality_id = this.questiondata.personality_id;
        this.fields.statement_a_pid = this.questiondata.statement_a_pid;
        this.fields.statement_b_pid = this.questiondata.statement_b_pid;
        this.fields.statement_a_text = this.questiondata.statement_a_text;
        this.fields.statement_b_text = this.questiondata.statement_b_text;
        this.fields.is_reverse = this.questiondata.is_reverse;
        this.fields.type = this.questiondata.type;
        this.attempted.push(this.questiondata.id);
        this.fields.attempted = this.attempted;
      })
      .catch((error) => {
        //  console.log('error', error)
      });
  },
  methods: {
    test(response) {},
    sendresponse: function (event) {
      if (window.navigator.onLine == false) {
        alert("Internet Connection not available");
        return false;
      }

      var ans = event.currentTarget.getAttribute("data-val");
      var id = event.currentTarget.getAttribute("id");
      var element = document.getElementById("main-wrapper");
      element.classList.add("myreadonly");
      parent = event.currentTarget.parentNode.querySelector(".svg-circle");
      var child = parent.children;
      var circle = child[0];
      var backclass = document.getElementsByClassName("faux-radio")[0];
      var backclass = event.currentTarget;
      backclass.style.backgroundColor = "#d4b6a6";
      backclass.style.borderColor = "#d4b6a6";
      var interval = 10;
      var angle = 0;
      var angle_increment = 6;
      var current = this;
      var currentevent = event;
      this.previousData = [];
      this.questiondata = this.fields;
      this.PreviousData(); //assigning values to previous array
      // console.log('fields=',this.fields.question);
      window.timer = window.setInterval(
        function () {
          circle.setAttribute("stroke-dasharray", angle + ", 200");
          if (angle >= 200) {
            window.clearInterval(window.timer);
          }
          angle += angle_increment;
        }.bind(this),
        interval
      );
      setTimeout(function () {
        current.QuestionResponse(currentevent, ans, id);
      }, 600);
      setTimeout(function () {
        var element = document.getElementById("main-wrapper");
        //element.classList.remove("myreadonly");
        var angle = 0;
        circle.setAttribute("stroke-dasharray", angle + ", 500");
        backclass.style.backgroundColor = "#fff";
      }, 700);
    },

    QuestionResponse: function (event, ans, id) {
      if (this.fields.type == "B") {
        this.fields.personality_id = id;
      }
      //   $(window).on('beforeunload',function(){
      //        return null;
      //    });

      this.responseObj.question_id = this.fields.question_id;
      this.responseObj.type = this.fields.type;
      this.responseObj.rank = this.fields.rank;
      this.responseObj.is_reverse = this.fields.is_reverse;
      this.responseObj.personality_id = this.fields.personality_id;
      this.responseObj.statement_a_pid = this.fields.statement_a_pid;
      this.responseObj.statement_b_pid = this.fields.statement_b_pid;
      this.responseObj.answer = ans;
      this.userresponses[this.counter] = this.responseObj;
      // console.log(this.userresponses);

      // Vue.set(this.responseObj, "question_id", this.fields.question_id);
      // Vue.set(this.responseObj, "type", this.fields.type);
      // Vue.set(this.responseObj, "rank", this.fields.rank);
      // Vue.set(this.responseObj, "is_reverse", this.fields.is_reverse);
      // Vue.set(this.responseObj, "personality_id", this.fields.personality_id);
      // Vue.set(this.responseObj, "statement_a_pid", this.fields.statement_a_pid);
      // Vue.set(this.responseObj, "statement_b_pid", this.fields.statement_b_pid);
      // Vue.set(this.responseObj, "answer", ans);
      // Vue.set(this.userresponses, this.counter, this.responseObj);
      this.allAnswers.push(ans);
      this.fields.userresponses = this.userresponses;
      this.fields.answer = ans;
      this.fields.stage = this.stage;
      this.fields.allAnswers = this.allAnswers;
      // return false;
      this.responseObj = {};
      if (this.loadercount == 99) {
        this.loader = 1;
      }
      this.fields.lang_id = this.lang_id;

      Response.questionresponse(this.fields)
        .then((response) => {
          console.log(response.status);
          if (response.data.status == 1) {
            this.previous = 1;
            this.fields.answer = "";
            let responsedata = response.data.response;
            document
              .getElementById("main-wrapper")
              .classList.remove("myreadonly");
            if (responsedata.type == "A") {
              document.querySelector(".question").innerHTML = "";
              document.querySelector(".question").innerHTML =
                responsedata.question;
            }
            console.log("qusetion=", responsedata.question);
            this.questiondata.id = responsedata.id;
            this.questiondata.question = responsedata.question;
            this.questiondata.personality_id = responsedata.personality_id;
            this.questiondata.statement_a_text = responsedata.statement_a_text;
            this.questiondata.statement_b_text = responsedata.statement_b_text;
            this.attempted.push(responsedata.id);
            this.fields.question_id = responsedata.id;
            this.fields.rank = responsedata.rank;
            this.fields.type = responsedata.type;
            this.fields.personality_id = responsedata.personality_id;
            this.fields.question = responsedata.question;
            this.fields.statement_a_pid = responsedata.statement_a_pid;
            this.fields.statement_b_pid = responsedata.statement_b_pid;
            this.fields.statement_a_text = responsedata.statement_a_text;
            this.fields.statement_b_text = responsedata.statement_b_text;
            this.fields.attempted = this.attempted; //all the attempted questions ids
            this.fields.is_reverse = responsedata.is_reverse;
            this.fields.discard = response.data.discard;
            this.fields.userResults = response.data.userResults;
            this.fields.dpArray = response.data.dpArray;
            //  console.log('asfd',this.questiondata.statement_a_text);
            this.fields.p1 = response.data.p1;
            this.fields.p2 = response.data.p2;
            this.fields.stage = response.data.stage;
            if (responsedata.type == "B") {
              this.fields.typeBcount = response.data.typeBcount;
              if (this.fields.typeBcount == 1) {
                this.progresscount = 97;
              } else if (this.fields.typeBcount == 2) {
                document.querySelector(".qb1").innerHTML =
                  this.questiondata.statement_a_text;
                document.querySelector(".qb2").innerHTML =
                  this.questiondata.statement_b_text;
                this.progresscount = 98;
              } else if (this.fields.typeBcount == 3) {
                document.querySelector(".qb1").innerHTML =
                  this.questiondata.statement_a_text;
                document.querySelector(".qb2").innerHTML =
                  this.questiondata.statement_b_text;
                this.progresscount = 99;
                this.loadercount = 99;
              }
              // this.progresscount=response.data.barvalue;

              let margin = this.progresscount;
              document.querySelector(".progress-bar").style.width =
                this.progresscount + "%";
              if (window.screen.width > 800) {
                if (this.progresscount > 97) {
                  margin = 97;
                }
              } else if (
                window.screen.width > 600 &&
                window.screen.width <= 800
              ) {
                if (this.progresscount > 95) {
                  margin = 95;
                }
              } else if (
                window.screen.width >= 400 &&
                window.screen.width <= 600
              ) {
                if (this.progresscount > 93) {
                  margin = 93;
                }
              } else if (window.screen.width < 400) {
                if (this.progresscount > 90) {
                  margin = 90;
                }
              }
              document.querySelector(".progress-text").style.marginLeft =
                margin + "%";
            } else {
              var totalanswered = this.attempted.length;
              var percentage = (totalanswered / 75) * 100;
              this.progresscount = response.data.barvalue;
              this.fields.progresscount = this.progresscount;
              document.querySelector(".progress-bar").style.width =
                this.progresscount + "%";
              document.querySelector(".progress-text").style.marginLeft =
                this.progresscount + "%";
            }
            this.stage = response.data.stage;
            this.counter = this.counter + 1;
            this.qcounter = this.qcounter + 1;
          } //end status 1 if
          else if (response.data.status == 0) {
            //No Data
            this.status = response.data.status;
            this.stage = response.data.stage;
          } else if (response.data.status == -1) {
            //same response
            this.showSame = 1;
            this.showSection = 0;
            document.querySelector(".btnclose").style.display = "none";
            document.querySelector(".main-container").classList.add("blur");
          } else if (response.data.status == 4) {
            //winner declare
            //  alert('Your personality type is  '+response.data.winner);
            window.location.href =
              this.translations.redirect_url + response.data.result_id;
          } else {
            this.questiondata.question = "No Question Available";
          }
        })
        .catch((error) => {
          //  console.log('error', error)
        });
    },
    closetest: function (event) {
      this.showClose = 1;
      this.showSection = 0;
      document.querySelector(".btnclose").style.display = "none";
      document.querySelector(".main-container").classList.add("blur");
    },
    resumetest: function (event) {
      this.showClose = 0;
      this.showSection = 1;
      document.querySelector(".btnclose").style.display = "block";
      document.querySelector(".main-container").classList.remove("blur");
    },
    PreviousData: function (event) {
      // console.log('prev',this.fields);
      this.previousData.meansBefore3 = this.fields.meansBefore3;
      this.previousData.lang_id = this.fields.lang_id;
      this.previousData.sdBefore3 = this.fields.sdBefore3;
      this.previousData.excludedRound = this.fields.excludedRound;
      this.previousData.discard = this.fields.discard;
      this.previousData.userResults = this.fields.userResults;
      this.previousData.typeBcount = this.fields.typeBcount;
      this.previousData.round = this.fields.round;
      this.previousData.counter = this.fields.counter;
      this.previousData.p1 = this.fields.p1;
      this.previousData.p2 = this.fields.p2;
      this.previousData.rank = this.fields.rank;
      this.previousData.question = this.fields.question;
      this.previousData.is_reverse = this.fields.is_reverse;
      this.previousData.question_id = this.fields.question_id;
      this.previousData.personality_id = this.fields.personality_id;
      this.previousData.statement_a_pid = this.fields.statement_a_pid;
      this.previousData.statement_b_pid = this.fields.statement_b_pid;
      this.previousData.statement_a_text = this.fields.statement_a_text;
      this.previousData.statement_b_text = this.fields.statement_b_text;
      this.previousData.answer = this.fields.answer;
      this.previousData.attempted = this.fields.attempted;
      this.previousData.dpArray = this.fields.dpArray;
      this.previousData.allAnswers = this.fields.allAnswers;
      this.previousData.userresponses = this.fields.userresponses;
      this.previousData.stage = this.fields.stage;
      this.previousData.type = this.fields.type;
      this.previousData.progresscount = this.fields.progresscount;
      this.stage = this.fields.stage;
      // console.log(this.previousData);
    },
    previousquestion: function (event) {
      if (this.previousData.type == "A") {
        if (this.fields.typeBcount == 1) {
          this.stage = 2;
          this.status = 1;
          var question = this.previousData.question;
          setTimeout(function () {
            document.querySelector(".question").innerHTML = question;
          }, 50);
        } else {
          document.querySelector(".question").innerHTML =
            this.previousData.question;
        }
        this.questiondata.question = this.previousData.question;
        //  alert(this.previousData.question);
      } else {
        this.loadercount--;
        document.querySelector(".qb1").innerHTML =
          this.previousData.statement_a_text;
        document.querySelector(".qb2").innerHTML =
          this.previousData.statement_b_text;
      }

      this.fields = {
        meansBefore3: this.previousData.meansBefore3,
        lang_id: this.previousData.lang_id,
        sdBefore3: this.previousData.sdBefore3,
        excludedRound: this.previousData.excludedRound,
        discard: this.previousData.discard,
        userResults: this.previousData.userResults,
        typeBcount: this.previousData.typeBcount,
        p1: this.previousData.p1,
        p2: this.previousData.p2,
        round: this.previousData.round,
        counter: this.previousData.counter,
        rank: this.previousData.rank,
        id: this.previousData.question_id,
        question_id: this.previousData.question_id,
        question: this.previousData.question,
        is_reverse: this.previousData.is_reverse,
        personality_id: this.previousData.personality_id,
        statement_a_pid: this.previousData.statement_a_pid,
        statement_b_pid: this.previousData.statement_b_pid,
        statement_a_text: this.previousData.statement_a_text,
        statement_b_text: this.previousData.statement_b_text,
        answer: this.previousData.answer,
        attempted: this.previousData.attempted,
        dpArray: this.previousData.dpArray,
        allAnswers: this.previousData.allAnswers,
        userresponses: this.previousData.userresponses,
        progresscount: this.previousData.progresscount,
        stage: this.previousData.stage,
        type: this.previousData.type,
      };

      this.attempted.pop();
      this.allAnswers.pop();
      // alert(this.previousData.question_id);
      // console.log('prevquestion',this.previousData.question);
      // console.log('question_id',this.previousData.progresscount);
      document.querySelector(".progress-bar").style.width =
        this.previousData.progresscount + "%";
      document.querySelector(".progress-text").style.marginLeft =
        this.previousData.progresscount + "%";
      this.progresscount = this.previousData.progresscount;
      this.counter = this.counter - 1;
      this.qcounter = this.qcounter - 1;
      this.previous = 0;
    },
  },
};
</script>
