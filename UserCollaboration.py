import sys
import csv
import MySQLdb
from math import sqrt
from collections import OrderedDict
import json
def sim_distance(grades, p1, p2):
    si = {}
    for item in grades[p1]:
        if item in grades[p2]:
            si[item] = 1
    if len(si) == 0:
        return 0
    sum_of_squares = sum([pow(grades[p1][item] - grades[p2][item], 2) for item in
                         grades[p1] if item in grades[p2]])
    return 1 / (1 + sqrt(sum_of_squares))
def sim_pearson(grades, p1, p2):
    si = {}
    for item in grades[p1]:
        if item in grades[p2]:
            si[item] = 1
    if len(si) == 0:
        return 0
    n = len(si)
    sum1 = sum([grades[p1][it] for it in si])
    sum2 = sum([grades[p2][it] for it in si])
    sum1Sq = sum([pow(grades[p1][it], 2) for it in si])
    sum2Sq = sum([pow(grades[p2][it], 2) for it in si])
    pSum = sum([grades[p1][it] * grades[p2][it] for it in si])
    num = pSum - sum1 * sum2 / n
    den = sqrt((sum1Sq - pow(sum1, 2) / n) * (sum2Sq - pow(sum2, 2) / n))
    if den == 0:
        return 0
    r = num / den
    return r

def topMatches(prefs,person,n=5,similarity=sim_pearson):
    scores = [(similarity(prefs, person, other), other) for other in prefs if other != person]
    scores.sort()
    scores.reverse()
    return scores[0:n]
def getRecommendations(grades, person):
    totals = {}
    simSums = {}
    for other in grades:
        if other == person:
            continue
        sim = sim_pearson(grades, person, other)
        if sim <= 0:
            continue
        for course in grades[other]:
            if course not in grades[person] or grades[person][course] == 0:
                totals.setdefault(course, 0)
                totals[course] += grades[other][course] * sim
                simSums.setdefault(course, 0)
                simSums[course] += sim
    rankings = [(total / simSums[course], course) for (course, total) in totals.items()]
    rankings.sort()
    rankings.reverse()
    return rankings

delimiter = ','
result = {}
with open("Book1.csv", 'r') as data_file:
    data = csv.reader(data_file, delimiter=delimiter)
    headers = next(data)[1:] # month names starting from 2nd column in csv
    for row in data:
        temp_dict = {}
        name = row[0]
        values = []
      
        for x in row[1:]:
                values.append(int(x))
            
        for i in range(len(values)):
            if values[i]: # exclude 0 values
                temp_dict[headers[i]] = values[i]
        result[name] = temp_dict    
#print(result)

db = MySQLdb.connect(host="localhost",user="root",passwd="",db="courserec")
cur = db.cursor()
cur.execute("SELECT CourseCode,GradePoints FROM coursetaken where RollNo='"+sys.argv[1]+"'")
#cur.execute("SELECT CourseCode,GradePoints FROM coursetaken where RollNo='15MX05'")
target={}
for row in cur.fetchall() :
    target[row[0]]=int(row[1])
result[sys.argv[1]]=target
#result["15MX05"]=target
jsonresult=OrderedDict()
s=getRecommendations(result,sys.argv[1])
#s=getRecommendations(result,"15MX05")
for i in s:
    num=int(round(i[0]))
    grade="F"
    if num==10:
        grade="S"
    elif num==9:
        grade="A"
    elif num==8:
        grade="B"
    elif num==7:
        grade="C"
    elif num==6:
        grade="D"
    else:
        grade="F"
    jsonresult[i[1]]=grade
finaljson=OrderedDict()
jslist=[]
#print json.dumps(jsonresult)
for (key,value) in jsonresult.items():
    finaljs=OrderedDict()
    key=key.replace("14","15")
    cur.execute("SELECT CourseTitle,Rating,TotalVotes FROM coursedetails where CourseCode='"+key+"' and CourseCode not in (Select CourseCode from coursetaken where RollNo='"+sys.argv[1]+"')")
    row=cur.fetchone()
    finaljs["CourseCode"]=key
    finaljs["CourseTitle"]=row[0]
    finaljs["Rating"]=str(row[1])
    finaljs["TotalVotes"]=str(row[2])
    finaljs["ExpGrade"]=value
    jslist.append(finaljs)
finaljson["courses"]=jslist
print(json.dumps(finaljson))
