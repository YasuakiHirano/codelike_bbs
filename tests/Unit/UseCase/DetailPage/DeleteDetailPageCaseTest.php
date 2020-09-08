<?php

namespace Tests\Unit\UseCase\DetailPage;

use App\Http\UseCase\DetailPage\CreateDetailPageCase;
use App\Http\UseCase\DetailPage\DeleteDetailPageCase;
use App\Http\UseCase\MakeBoard\CreateMakeBoardCase;
use App\Model\Board;
use App\Model\Message;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeleteDetailPageCaseTest extends TestCase
{
    use DatabaseMigrations;

    public function testDelete()
    {
        // -- 掲示板作成 --
        $createMakeBoardCase = new CreateMakeBoardCase();
        $createResult = $createMakeBoardCase->__invoke('boardTitleTest', 'boardUserNameTest', 'boardAboutTextTest', 'boardPasswordTest');
        $this->assertTrue($createResult); // 作成できたらtrue

        // -- 作成した掲示板を削除 --
        $board = Board::where('title', 'boardTitleTest')->first();
        $deleteDetailPageCase = new DeleteDetailPageCase();
        $deleteResult = $deleteDetailPageCase->__invoke($board->id, 'boardPasswordTest');
        $this->assertTrue($deleteResult); // 削除できたらtrue

        // -- 削除したものがDBから消えているか --
        $board = Board::where('title', 'boardTitleTest')->first();
        $this->assertNull($board);
    }
}
