<?php
class SequenceCorrector {
    private $maxVal = [];

    public function correct($input) {
        $input = array_filter(array_map('trim', explode("\n", $input)));

        $arr = [];

        foreach ($input as $seq) {
            $seqns = explode('.', $seq);
            $ref = &$arr;
            foreach ($seqns as $aseqns => $sequence) {
                if (!isset($ref[$sequence])) {
                    $ref[$sequence] = [];
                }

                $sequenceKey = implode('.', array_slice($seqns, 0, $aseqns));

                $num = (int)$sequence;
                if (!isset($this->maxVal[$sequenceKey]) || $num > $this->maxVal[$sequenceKey]) {
                    $this->maxVal[$sequenceKey] = $num;
                }

                $ref = &$ref[$sequence];
            }
        }

        $result = [];
        $this->corrected($arr, [], $result);
        return $result;
    }

    private function corrected($node, $prefix, &$result) {
        $sequenceKey = implode('.', $prefix);
        $max = $this->maxVal[$sequenceKey] ?? 0;

        for ($i = 1; $i <= $max; $i++) {
            $key = (string)$i;
            $current = array_merge($prefix, [$key]);
            $result[] = implode('.', $current);

            if (!isset($node[$key])) {
                $node[$key] = [];
            }

            $this->corrected($node[$key], $current, $result);
        }
    }
}
