def operation(op, a, b):
	  if op =='+':
		    return a+b
	  elif op=='-':
		    return a-b
	  elif op =='*':
		    return a*b
	  elif op =='/':
		    return a/b
	  else:
		    return 'Error'

print(operation('#',10,5))