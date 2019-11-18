def operations(op,a,b):
	if op=='+':
		return a+b
	elif op=='-':
		return a-b
	elif op=='*':
		return a*b
	elif op=='/':
		return a/b
	else:
		return "Error"
	

print(operations('#',10,5))