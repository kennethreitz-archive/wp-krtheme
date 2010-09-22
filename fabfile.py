from fabric.api import *

env['host_string'] = 'root@zumhosting.com'


def push():
	""" Pushes the application to the server """

	print('Compressing application')
	local('tar -czf /tmp/krtheme.tar . ')

	print('Uploading application to server')
	put('/tmp/krtheme.tar', '/tmp/')

	print('Extraction application')
	with cd('/var/www/vhosts/kennethreitz.com/httpdocs/blog/wp-content/themes/krtheme/'):
		# run('rm -fr *')
		run('tar xzf /tmp/krtheme.tar')
		run('rm -fr /tmp/krtheme.tar')
		
		# print('Restarting Apache.')
		# run('/etc/init.d/apache2 stop')
		# run('/etc/init.d/apache2 start')
		
		print('Application Pushed.')
