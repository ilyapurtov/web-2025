PROGRAM Task2(INPUT, OUTPUT);
USES
    dos;
VAR
    Query: STRING;
BEGIN {Task2}
  WRITELN('Content-type: text/plain');
  WRITELN;
  Query := GetEnv('QUERY_STRING');
  IF Query = 'lanterns=1'
  THEN
    WRITELN('The British are coming by land.')
  ELSE IF Query = 'lanterns=2'
  THEN
    WRITELN('The British are coming by sea.')
  ELSE
    WRITELN('Sarah didn`t say.')
END. {Task2}

