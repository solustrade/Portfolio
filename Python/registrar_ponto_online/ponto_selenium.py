from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome()
driver.get("URL_DO_APLICATIVO_DE_PONTO_ONLINE")

input_element = driver.find_element(By.ID, "id_da_tag_nome_do_usuario")
input_element.send_keys("nome_do_usuario")

input_element = driver.find_element(By.ID, "id_da_tag_senha_do_usuario")
input_element.send_keys("senha_do_usuario")

# Pressiona Enter após inserir a senha
input_element.send_keys(Keys.RETURN)

time.sleep(10)