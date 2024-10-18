# transposition
The piano keyboard is divided into octaves, each octave has 12 notes.

The distance between two random notes is called “interval”. The interval between two neighboring
notes is called “semitone”. The interval of 12 semitones (1 octave) doubles the sound frequency.
Transposition refers to the process or operation of moving a musical piece (a collection of notes) up or
down in pitch by a constant interval. For example, if you transpose 2 tones (4 semitones) down the note
5, it becomes note 1, if you transpose the note 2 by the same interval, it will become note 10 of the
previous octave etc.
Let’s define a note as an array of two elements: [$octaveNumber, $noteNumber] (e.g. [1, 7]). We skip
the duration of a particular note for simplicity.
Let’s define a musical piece as a collection of notes (e.g. [[2, 1], [1, 10], [1, 5]]).
The piano keyboard has 7 full octaves (-2, -1, 0, 1, 2, 3, 4) and 2 partial ones (-3 and 5). The first note is [-
3, 10], the last one is [5, 1].
Your task is to write a console script to perform a transposition. It should accept 2 parameters: an input
JSON file with a collection of notes and a number of semitones to transpose to (can be negative). It
should produce a JSON file with the transposed collection of notes. If at least one of the resulting notes
falls out of the keyboard range, your script should return an error message.

Sample input:
[[2,1],[2,6],[2,1],[2,8],[2,1],[2,9],[2,1],[2,6],[2,1],[2,8],[2,1],[2,9],[2,1],[2,11],[2,1],[2,8],[2,1],[2,9],[2,1],[2,
11],[2,1],[3,1],[2,1],[2,9],[2,1],[2,11],[2,1],[3,1],[2,1],[3,2],[2,1],[2,11],[2,1],[3,1],[2,1],[2,9],[2,1],[2,11],[2,
1],[2,8],[2,1],[2,9],[2,1],[2,6],[2,1],[2,8],[2,1],[2,5],[2,1],[2,6],[2,1],[2,1],[2,1],[2,2],[2,1],[1,11],[2,1],[2,1],[
2,1],[1,9],[2,1],[1,11],[2,1],[1,8],[2,1],[1,9],[2,1],[1,6],[2,1],[1,11],[2,1],[1,8],[2,1],[1,9],[2,1],[1,6],[2,1],[1,
8],[2,1],[1,5],[2,1],[1,6]]
Sample output for transposing to -3 semitones:
[[1,10],[2,3],[1,10],[2,5],[1,10],[2,6],[1,10],[2,3],[1,10],[2,5],[1,10],[2,6],[1,10],[2,8],[1,10],[2,5],[1,10],[2,
6],[1,10],[2,8],[1,10],[2,10],[1,10],[2,6],[1,10],[2,8],[1,10],[2,10],[1,10],[2,11],[1,10],[2,8],[1,10],[2,10],[1,
10],[2,6],[1,10],[2,8],[1,10],[2,5],[1,10],[2,6],[1,10],[2,3],[1,10],[2,5],[1,10],[2,2],[1,10],[2,3],[1,10],[1,10],
[1,10],[1,11],[1,10],[1,8],[1,10],[1,10],[1,10],[1,6],[1,10],[1,8],[1,10],[1,5],[1,10],[1,6],[1,10],[1,3],[1,10],[1
,8],[1,10],[1,5],[1,10],[1,6],[1,10],[1,3],[1,10],[1,5],[1,10],[1,2],[1,10],[1,3]]
