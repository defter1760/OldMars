cd "C:\inetpub\wwwroot\mars"
cls

:loopz
hg pull
hg update
ping localhost -n 10
goto loopz