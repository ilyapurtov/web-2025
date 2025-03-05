PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Query, Param, K, V: STRING;
  I, Sep: INTEGER;
BEGIN {GetQueryStringParameter}
  Query := GetEnv('QUERY_STRING');
  Param := '';
  FOR I := 1 TO Length(Query)
  DO
    BEGIN
      IF Query[I] <> '&'
      THEN
        Param := Param + Query[I];
      IF (Query[I] = '&') OR (I = Length(Query))
      THEN
        BEGIN
          Sep := Pos('=', Param);
          K := Copy(Param, 1, Sep - 1);
          V := Copy(Param, Sep + 1, Length(Param) - Sep);
          IF Key = K
          THEN
            BEGIN
              GetQueryStringParameter := V;
              BREAK
            END
          ELSE
            GetQueryStringParameter := '';
          Param := '';
        END
    END;
END; {GetQueryStringParameter}

BEGIN {WorkWithQueryString}
  WRITELN('Content-type: text/plain');
  WRITELN;

  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}
