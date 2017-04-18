<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Survey</div>

                    <div class="panel-body" v-if=question>

                        <h4>{{ question.question }}</h4>

                        <a class="btn btn-primary" v-if="previousQuestion >= 0" @click=getPreviousQuestion>Previous
                            Question</a>
                        <a class="btn btn-primary" v-if="nextQuestion >= 0" @click=getNextQuestion>Next Question</a>

                    </div>

                    <div class="panel-body" v-else>
                        <h2>Question is being loaded</h2>
                    </div>

                    <pre>
                        question: {{ question }}
                        currentQuestion: {{ currentQuestion }}
                        nextQuestion: {{ nextQuestion }}
                        previousQuestion: {{ previousQuestion }}
                    </pre>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                question: null,
                currentQuestion: null,
                nextQuestion: null,
                previousQuestion: null,
            }
        },

        mounted() {
            this.fetchQuestion();
        },

        methods: {
            getNextQuestion() {
                this.currentQuestion = this.nextQuestion;

                this.fetchQuestion();
            },

            getPreviousQuestion() {
                this.currentQuestion = this.previousQuestion;

                this.fetchQuestion();
            },

            fetchQuestion() {
                var url = '/api/questions';

                if (this.currentQuestion) {
                    url = url + '/' + this.currentQuestion;
                }

                axios.get(url)
                    .then(response => {
                        this.question = response.data.data;
                        this.currentQuestion = response.data.current;
                        this.nextQuestion = response.data.next == null ? -1 : response.data.next;
                        this.previousQuestion = response.data.previous == null ? -1 : response.data.previous;
                    });
            }
        }

    }



</script>
