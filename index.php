<?php

const TOTAL_NOTES_IN_OCTAVE = 12;
const OFFSET = 3;

$FIRST_NOTE = [-3, 10];
$LAST_NOTE = [5, 1];

/**
 * @param $octave
 * @param $note
 * @return float|int
 */
function noteToPosition($octave, $note)
{
    return ($octave + OFFSET) * TOTAL_NOTES_IN_OCTAVE + ($note - 1);
}

/**
 * @param $position
 * @return array
 */
function positionToNote($position)
{
    $octave = floor($position / TOTAL_NOTES_IN_OCTAVE) - OFFSET;
    $note = ($position % TOTAL_NOTES_IN_OCTAVE) + 1;
    return [$octave, $note];
}

/**
 * @param $octave
 * @param $note
 * @param $firstNote
 * @param $lastNote
 * @return bool
 */
function isNoteInRange($octave, $note, $firstNote, $lastNote)
{
    $firstPosition = noteToPosition($firstNote[0], $firstNote[1]);
    $lastPosition = noteToPosition($lastNote[0], $lastNote[1]);
    $currentPosition = noteToPosition($octave, $note);
    return $currentPosition >= $firstPosition && $currentPosition <= $lastPosition;
}

/**
 * @param $notes
 * @param $semitones
 * @param $firstNote
 * @param $lastNote
 * @return array
 * @throws Exception
 */
function transposeNotes($notes, $semitones, $firstNote, $lastNote)
{
    $transposedNotes = [];
    foreach ($notes as $note) {
        list($octave, $noteNumber) = $note;
        $newPosition = noteToPosition($octave, $noteNumber) + $semitones;
        $newNote = positionToNote($newPosition);

        if (!isNoteInRange($newNote[0], $newNote[1], $firstNote, $lastNote)) {
            throw new Exception('One or more notes are out of the keyboard range.');
        }
        $transposedNotes[] = $newNote;
    }
    return $transposedNotes;
}

/**
 * @param $filePath
 * @return mixed
 */
function readJSONFile($filePath)
{
    $jsonContent = file_get_contents($filePath);
    return json_decode($jsonContent, true);
}

/**
 * @param $filePath
 * @param $data
 * @return void
 */
function writeJSONFile($filePath, $data)
{
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($filePath, $jsonData);
}

/**
 * @param $inputFile
 * @param $outputFile
 * @param $semitones
 * @param $firstNote
 * @param $lastNote
 * @return void
 */
function transposeMusic($inputFile, $outputFile, $semitones, $firstNote, $lastNote)
{
    try {
        $notes = readJSONFile($inputFile);
        $transposedNotes = transposeNotes($notes, $semitones, $firstNote, $lastNote);
        writeJSONFile($outputFile, $transposedNotes);
        echo 'Notes have been successfully transposed and saved.' . PHP_EOL;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage() . PHP_EOL;
    }
}

$inputFile = 'input.json';
$outputFile = 'output.json';
$semitones = -OFFSET;

transposeMusic($inputFile, $outputFile, $semitones, $FIRST_NOTE, $LAST_NOTE);


