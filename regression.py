import numpy as np
from sklearn.linear_model import LinearRegression
from pymongo import MongoClient
import datetime

client = MongoClient("localhost", 27017)
database = client.WeatherProjects
collection = database.Weather
collection2 = database.Predict

citys = [108, 159, 143, 112, 133, 119, 90, 131, 232, 168, 184]

for city in citys:
    dayData = []
    lowTempData = []
    highTempData = []
    month = 11
    num = 1

    m = 0
    d = 0
    rsts = collection.find({"City": city}, {"_id": 0, "Year": 1, "Month": 1, "Day": 1, "LowTemp": 1, "HighTemp": 1, "City": 1}).sort([("Month", 1), ("Day", 1)])
    for rst in rsts:
        tmpMonth = int(str(rst['Month']) + str(rst['Day']))
        if tmpMonth == month:
            dayData.append(num)
            num += 1
            lowTempData.append(int(rst['LowTemp']))
            highTempData.append(int(rst['HighTemp']))
            m = rst['Month']
            d = rst['Day']

        else:
            city = rst['City']
            print(city)
            x = np.array(dayData).reshape((-1, 1))
            y1 = np.array(lowTempData)
            y2 = np.array(highTempData)
            z = np.array([19, 20, 21, 22, 23, 24, 25, 26, 27, 28]).reshape((-1, 1))

            model = LinearRegression()
            model.fit(x, y2)
            r_sq = model.score(x, y2)
            print(month,"일")
            print('coefficient of determination', r_sq)
            print('intercept', model.intercept_)
            print('slope', model.coef_)
            y_pred = model.predict(z)
            print('predicted response1:', y_pred, sep='\n')
            print("------------------------------------------------")

            model2 = LinearRegression()
            model2.fit(x, y1)
            r_sq2 = model.score(x, y1)
            print(month, "일")
            print('coefficient of determination', r_sq2)
            print('intercept', model2.intercept_)
            print('slope', model2.coef_)
            y_pred2 = model2.predict(z)
            print('predicted response1:', y_pred2, sep='\n')
            print("------------------------------------------------")

            num = 1
            month = tmpMonth
            lowTempData = []
            highTempData = []
            dayData = []
            dayData.append(num)
            num += 1
            lowTempData.append(int(rst['LowTemp']))
            highTempData.append(int(rst['HighTemp']))

            date = datetime.date(2000, m, d)
            print("***********************************",date)

            collection2.insert({"city": city,
                                "date": str(date),
                                "2019": {"hightemp": y_pred[0], "lowtemp": y_pred2[0]},
                                "2022": {"hightemp": y_pred[3], "lowtemp": y_pred2[3]},
                                "2025": {"hightemp": y_pred[6], "lowtemp": y_pred2[6]},
                                "2028": {"hightemp": y_pred[9], "lowtemp": y_pred2[9]}
                                })

    city = rst['City']
    print(city)
    x = np.array(dayData).reshape((-1, 1))
    y1 = np.array(lowTempData)
    y2 = np.array(highTempData)
    z = np.array([19, 20, 21, 22, 23, 24, 25, 26, 27, 28]).reshape((-1, 1))

    model = LinearRegression()
    model.fit(x, y2)
    r_sq = model.score(x, y2)
    print(month, "일")
    print('coefficient of determination', r_sq)
    print('intercept', model.intercept_)
    print('slope', model.coef_)

    y_pred = model.predict(z)
    print('predicted response1:', y_pred, sep='\n')


    date = datetime.date(2000, m, d)

    collection2.insert({"city": city,
                        "date": str(date),
                        "2019": {"hightemp": y_pred[0], "lowtemp": y_pred2[0]},
                        "2022": {"hightemp": y_pred[3], "lowtemp": y_pred2[3]},
                        "2025": {"hightemp": y_pred[6], "lowtemp": y_pred2[6]},
                        "2028": {"hightemp": y_pred[9], "lowtemp": y_pred2[9]}
                        })

