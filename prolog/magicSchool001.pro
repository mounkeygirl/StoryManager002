student(henry).
student(james).
student(gertrude).
student(amber).

siblings(henry,amber).

male(henry).

female(amber).
female(james).
female(gertrude).

chosen_one(gertrude).

cross_dresser(henry).

nickname(jane,james).
nickname(henry,henrietta).

friends(henry,james).
friends(amber,beatrice).

class([henry,james,gertrude]).
class([amber,beatrice]).

%Rules

%As this is a magic school, all students can use magic
can_use_magic(X):-student(X).
male(X):-brother(X,_).
sister(X,Y):-siblings(X,Y),female(X).
brother(X,Y):-siblings(X,Y),male(X).
related(X,Y):-siblings(X,Y).
