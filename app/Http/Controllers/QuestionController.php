<?php

namespace App\Http\Controllers;

class QuestionController extends Controller
{
    /**
     * @var array
     */
    protected $questions;

    public function __construct()
    {
        $this->questions = [
            [
                'question' => 'Lorem ipsym question one?',
                'answers' => [
                    0 => 'no',
                    1 => 'yes',
                ],
            ], [
                'question' => 'Lorem ipsym question two?',
                'answers' => [
                    0 => 'no',
                    1 => 'yes',
                ],
            ], [
                'question' => 'Lorem ipsym question three?',
                'answers' => [
                    0 => 'no',
                    1 => 'yes',
                ],
            ], [
                'question' => 'Lorem ipsym question four?',
                'answers' => [
                    0 => 'no',
                    1 => 'yes',
                ],
            ], [
                'question' => 'Lorem ipsym question five?',
                'answers' => [
                    0 => 'no',
                    1 => 'yes',
                ],
            ]
        ];
    }

    /**
     * @param int $question
     * @return array
     */
    public function show($question = 0)
    {
        if (array_key_exists($question, $this->questions)) {
            return [
                'previous' => array_key_exists($question - 1, $this->questions) ? $question - 1 : null,
                'next' => array_key_exists($question + 1, $this->questions) ? $question + 1 : null,
                'current' => $question,
                'data' => $this->questions[$question],
            ];
        }

        return [
            'message' => 'Oops, something went wrong!',
        ];
    }
}
