<?php


class Backtracking
{
    const EMPTY_ENTRY = 0;

    /*
      Driver function to kick off the recursion
    */
    public function solveSudoku($board)
    {
        return $this->solveSudokuCell(0, 0, $board);
    }

    private function solveSudokuCell(int $row, int $col, array $board)
    {
        if ($col == count($board[$row])) {
            $col = 0;
            $row++;

            if ($row == count($board)) {
                return $board;
            }

        }

        if ($board[$row][$col] != Backtracking::EMPTY_ENTRY) {
            return $this->solveSudokuCell($row, $col + 1, $board);
        }

        for ($value = 1; $value <= count($board); $value++) {

            if ($this->canPlaceValue($board, $row, $col, $value)) {
                $board[$row][$col] = $value;

                $solvedBoard = $this->solveSudokuCell($row, $col + 1, $board);

                if ($solvedBoard) {
                    return $solvedBoard;
                }
            }
        }

        $board[$row][$col] = Backtracking::EMPTY_ENTRY;

        return false;
    }

    private function canPlaceValue(array $board, int $row, int $col, int $value)
    {

        foreach ($board as $element) {
            if ($value == $element[$col]) {
                return false;
            }
        }

        for ($i = 0; $i < count($board); $i++) {
            if ($value == $board[$row][$i]) {
                return false;
            }
        }

        $regionSize = (int) sqrt(count($board));

        $I1 = floor($row / $regionSize);
        $J1 = floor($col / $regionSize);

        $topLeftOfSubBoxRow = $regionSize * $I1;
        $topLeftOfSubBoxCol = $regionSize * $J1;

        for ($i = 0; $i < $regionSize; $i++) {
            for ($j = 0; $j < $regionSize; $j++) {
                if ($value == $board[$topLeftOfSubBoxRow + $i][$topLeftOfSubBoxCol + $j]) {
                    return false;
                }
            }
        }
        return true;
    }
}