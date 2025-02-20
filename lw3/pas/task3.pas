PROGRAM Task3(INPUT, OUTPUT);
USES
    dos;
VAR
    Query, UserName: STRING;
    StartPos, EndPos: INTEGER;
BEGIN {Task3}
  WRITELN('Content-type: text/plain');
  WRITELN;

  Query := GetEnv('QUERY_STRING');
  StartPos := Pos('name=', Query);
  
  IF StartPos = 0
  THEN
    WRITELN('Hello Anonymous!')
  ELSE
    BEGIN
      EndPos := Pos('&', Query) - 1;
      IF EndPos = -1
      THEN
        EndPos := Length(Query);
      WRITELN('Hello dear, ', Copy(Query, 6, EndPos - 5), '!')
    END
END. {Task3}

