import os
from os import listdir
from os.path import isfile, join
onlyfiles = [f for f in listdir(os.getcwd()) if isfile(join(os.getcwd(), f))]
print onlyfiles
for file in onlyfiles:
    if '.py' not in file:
        f=open(file,"r+")
        content=""
        line=f.readline()
        while(len(line)>0):
            parts = line.split(':')
            try:
                if 'Total L' not in parts[0] and not parts[0][0].isdigit():
                    content=content+"<br/><b>"+parts[0]+":</b><br/>"+parts[1]
                else:
                    content=content+"<br/>"+parts[0]+":"+parts[1]
            except:
                if(len(line)>0):
                    content=content+"<br/>"+line
            line=f.readline()
        content=content+"<br/><br/>"
        f.close()
        f=open(file,"w")
        f.write(content)
        f.close()
    else:
        continue
