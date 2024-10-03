import pyautogui
import subprocess
import time

url = "URL_DO_APLICATIVO_DE_PONTO_ONLINE"

subprocess.run(r"C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe")

time.sleep(1)

pyautogui.write(url)
pyautogui.press('enter')

time.sleep(5)

pyautogui.press('tab')
pyautogui.press('tab')
pyautogui.press('tab')
pyautogui.press('tab')
pyautogui.press('tab')
pyautogui.press('tab')
pyautogui.press('tab')
pyautogui.press('tab')

# time.sleep(1)
pyautogui.press('enter')

time.sleep(2)
pyautogui.press('tab')
pyautogui.write("nome_do_usuario")

# time.sleep(6)
pyautogui.press('tab')
pyautogui.write("senha_do_usuario")

time.sleep(1)
pyautogui.press('enter')