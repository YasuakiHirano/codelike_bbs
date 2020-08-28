<?php

namespace Tests\Unit;

use App\Http\UseCase\MakeBoard\CreateMakeBoardCase;
use App\Model\Board;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateMakeBoardCaseTest extends TestCase
{
    public function testRegister()
    {
        Board::truncate();

        $createMakeBoardCase = new CreateMakeBoardCase();
        $createResult = $createMakeBoardCase->__invoke('boardTitleTest', 'boardUserNameTest', 'boardAboutTextTest', 'boardPasswordTest');

        $board = Board::where('title', 'boardTitleTest')->first();

        $this->assertTrue($createResult);
        $this->assertEquals('boardTitleTest', $board->title);
        $this->assertEquals('boardUserNameTest', $board->user_name);
        $this->assertEquals('boardAboutTextTest', $board->about_text);
        $this->assertEquals('boardPasswordTest', $board->password);
    }
}