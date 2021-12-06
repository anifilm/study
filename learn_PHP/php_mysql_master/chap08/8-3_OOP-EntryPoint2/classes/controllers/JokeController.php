<?php

class JokeController {
    private $authorsTable;
    private $jokesTable;

    public function __construct(DatabaseTable $jokesTable, DatabaseTable $authorsTable) {
        $this->jokesTable = $jokesTable;
        $this->authorsTable = $authorsTable;
    }

    public function home() {
        $title = '인터넷 유머 세상';

        return [
            'template' => 'home.html.php',
            'title' => $title,
        ];
    }

    public function list() {
        $result = $this->jokesTable->findAll();

        $jokes = [];
        foreach ($result as $joke) {
            $author = $this->authorsTable->findById($joke['authorid']);
            $jokes[] = [
                'id' => $joke['id'],
                'joketext' => $joke['joketext'],
                'jokedate' => $joke['jokedate'],
                'name' => $author['name'],
                'email' => $author['email'],
            ];
        }

        $totalJokes = $this->jokesTable->total();
        $title = '유머 글 목록';

        return [
            'template' => 'jokes.html.php',
            'title' => $title,
            'variables' => [
                'totalJokes' => $totalJokes,
                'jokes' => $jokes,
            ],
        ];
    }

    public function edit() {
        if (isset($_POST['joke'])) {
            $joke = $_POST['joke'];
            $joke['jokedate'] = new DateTime();
            $joke['authorId'] = 1;

            $this->jokesTable->save($joke);

            header('location: index.php?action=list');

        } else {
            // id가 있는 경우에만 글 데이터를 가져온다.
            if (isset($_GET['id'])) {
                $joke = $this->jokesTable->findById($_GET['id']);
                $title = '유머 글 수정';
                $button = '수정';
            } else {
                $title = '유머 글 등록';
                $button = '등록';
            }

            return [
                'template' => 'editjoke.html.php',
                'title' => $title,
                'variables' => [
                    'button' => $button,
                    'joke' => $joke ?? null,
                ],
            ];
        }
    }

    public function delete() {
        $this->jokesTable->delete($_POST['id']);

        header('location: index.php?action=list');
    }
}
