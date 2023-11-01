# pip install requests
# pip install beautifulsoup4
# pip install mysql-connector-python
import requests
from bs4 import BeautifulSoup
import json
import mysql.connector
import re


def scrape_data(url):
    headers = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.3'}
    response = requests.get(url, headers=headers)

    if response.status_code != 200:
        print("Failed to retrieve the webpage.")
        return None

    soup = BeautifulSoup(response.text, 'html.parser')

    items = soup.find_all('div', {'class': 'p-item-inner'})

    data_list = []

    for item in items:
        # Fetch image source link
        img_tag = item.find('div', {'class': 'p-item-img'}).find('img')
        img_src = img_tag.get('src', 'N/A') if img_tag else 'N/A'

        # Fetch item name
        name_tag = item.find('h4', {'class': 'p-item-name'}).find('a')
        item_name = name_tag.text if name_tag else 'N/A'
        link = name_tag.get('href', 'N/A') if name_tag else 'N/A'

        # Fetch price
        price_tag = item.find('div', {'class': 'p-item-price'}).find('span')
        price_str = price_tag.text if price_tag else 'TBA'

        price = ''.join(
            [char for char in price_str if char.isdigit()])

        data_list.append({
            'image_src': img_src,
            'item_name': item_name,
            'link': link,
            'price': price
        })

    return data_list


def save_to_mysql(data_list):

    db_connection = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="test"
    )

    cursor = db_connection.cursor()

    # Prepare the INSERT statement
    insert_query = """
    INSERT INTO Product_details (img_src, item_name,link, price) VALUES (%s, %s, %s, %s)
    """

    for item in data_list:
        # Execute the INSERT statement
        cursor.execute(
            insert_query, (item['image_src'], item['item_name'], item['link'], item['price']))

    # Commit changes to the database
    db_connection.commit()

    # Close the connection
    cursor.close()
    db_connection.close()


if __name__ == "__main__":
    url = "https://www.startech.com.bd/drone"
    scraped_data = scrape_data(url)

    if scraped_data:
        save_to_mysql(scraped_data)
        print("Data saved to MySQL table 'Product_details'")
