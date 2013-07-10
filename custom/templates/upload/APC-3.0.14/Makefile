srcdir = /opt/bms/custom/templates/upload/APC-3.0.14
builddir = /opt/bms/custom/templates/upload/APC-3.0.14
top_srcdir = /opt/bms/custom/templates/upload/APC-3.0.14
top_builddir = /opt/bms/custom/templates/upload/APC-3.0.14
EGREP = grep -E
SED = /bin/sed
CONFIGURE_COMMAND = './configure'
CONFIGURE_OPTIONS =
SHLIB_SUFFIX_NAME = so
SHLIB_DL_SUFFIX_NAME = so
ZEND_EXT_TYPE = zend_extension
RE2C = exit 0;
AWK = gawk
shared_objects_apc = apc.lo php_apc.lo apc_cache.lo apc_compile.lo apc_debug.lo apc_fcntl.lo apc_main.lo apc_mmap.lo apc_sem.lo apc_shm.lo apc_futex.lo apc_pthreadmutex.lo apc_spin.lo pgsql_s_lock.lo apc_sma.lo apc_stack.lo apc_zend.lo apc_rfc1867.lo
PHP_PECL_EXTENSION = apc
APC_SHARED_LIBADD = -lrt
APC_CFLAGS =
PHP_MODULES = $(phplibdir)/apc.la
PHP_ZEND_EX =
all_targets = $(PHP_MODULES) $(PHP_ZEND_EX)
install_targets = install-modules install-headers
prefix = /usr
exec_prefix = $(prefix)
libdir = ${exec_prefix}/lib
prefix = /usr
phplibdir = /opt/bms/custom/templates/upload/APC-3.0.14/modules
phpincludedir = /usr/include/php
CC = cc
CFLAGS = -g -O2
CFLAGS_CLEAN = $(CFLAGS)
CPP = cc -E
CPPFLAGS = -DHAVE_CONFIG_H
CXX =
CXXFLAGS =
CXXFLAGS_CLEAN = $(CXXFLAGS)
EXTENSION_DIR = /usr/lib64/php/modules
PHP_EXECUTABLE = /usr/bin/php
EXTRA_LDFLAGS =
EXTRA_LIBS =
INCLUDES = -I/usr/include/php -I/usr/include/php/main -I/usr/include/php/TSRM -I/usr/include/php/Zend -I/usr/include/php/ext -I/usr/include/php/ext/date/lib
LFLAGS =
LDFLAGS =
SHARED_LIBTOOL =
LIBTOOL = $(SHELL) $(top_builddir)/libtool
SHELL = /bin/sh
INSTALL_HEADERS =
mkinstalldirs = $(top_srcdir)/build/shtool mkdir -p
INSTALL = $(top_srcdir)/build/shtool install -c
INSTALL_DATA = $(INSTALL) -m 644

DEFS = -DPHP_ATOM_INC -I$(top_builddir)/include -I$(top_builddir)/main -I$(top_srcdir)
COMMON_FLAGS = $(DEFS) $(INCLUDES) $(EXTRA_INCLUDES) $(CPPFLAGS) $(PHP_FRAMEWORKPATH)

all: $(all_targets) 
	@echo
	@echo "Build complete."
	@echo "Don't forget to run 'make test'."
	@echo
	
build-modules: $(PHP_MODULES) $(PHP_ZEND_EX)

libphp$(PHP_MAJOR_VERSION).la: $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS)
	$(LIBTOOL) --mode=link $(CC) $(CFLAGS) $(EXTRA_CFLAGS) -rpath $(phptempdir) $(EXTRA_LDFLAGS) $(LDFLAGS) $(PHP_RPATHS) $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS) $(EXTRA_LIBS) $(ZEND_EXTRA_LIBS) -o $@
	-@$(LIBTOOL) --silent --mode=install cp $@ $(phptempdir)/$@ >/dev/null 2>&1

libs/libphp$(PHP_MAJOR_VERSION).bundle: $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS)
	$(CC) $(MH_BUNDLE_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS) $(LDFLAGS) $(EXTRA_LDFLAGS) $(PHP_GLOBAL_OBJS:.lo=.o) $(PHP_SAPI_OBJS:.lo=.o) $(PHP_FRAMEWORKS) $(EXTRA_LIBS) $(ZEND_EXTRA_LIBS) -o $@ && cp $@ libs/libphp$(PHP_MAJOR_VERSION).so

install: $(all_targets) $(install_targets)

install-sapi: $(OVERALL_TARGET)
	@echo "Installing PHP SAPI module:       $(PHP_SAPI)"
	-@$(mkinstalldirs) $(INSTALL_ROOT)$(bindir)
	-@if test ! -r $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME); then \
		for i in 0.0.0 0.0 0; do \
			if test -r $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME).$$i; then \
				$(LN_S) $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME).$$i $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME); \
				break; \
			fi; \
		done; \
	fi
	@$(INSTALL_IT)

install-modules: build-modules
	@test -d modules && \
	$(mkinstalldirs) $(INSTALL_ROOT)$(EXTENSION_DIR)
	@echo "Installing shared extensions:     $(INSTALL_ROOT)$(EXTENSION_DIR)/"
	@rm -f modules/*.la >/dev/null 2>&1
	@$(INSTALL) modules/* $(INSTALL_ROOT)$(EXTENSION_DIR)

install-headers:
	-@if test "$(INSTALL_HEADERS)"; then \
		for i in `echo $(INSTALL_HEADERS)`; do \
			i=`$(top_srcdir)/build/shtool path -d $$i`; \
			paths="$$paths $(INSTALL_ROOT)$(phpincludedir)/$$i"; \
		done; \
		$(mkinstalldirs) $$paths && \
		echo "Installing header files:          $(INSTALL_ROOT)$(phpincludedir)/" && \
		for i in `echo $(INSTALL_HEADERS)`; do \
			if test "$(PHP_PECL_EXTENSION)"; then \
				src=`echo $$i | $(SED) -e "s#ext/$(PHP_PECL_EXTENSION)/##g"`; \
			else \
				src=$$i; \
			fi; \
			if test -f "$(top_srcdir)/$$src"; then \
				$(INSTALL_DATA) $(top_srcdir)/$$src $(INSTALL_ROOT)$(phpincludedir)/$$i; \
			elif test -f "$(top_builddir)/$$src"; then \
				$(INSTALL_DATA) $(top_builddir)/$$src $(INSTALL_ROOT)$(phpincludedir)/$$i; \
			else \
				(cd $(top_srcdir)/$$src && $(INSTALL_DATA) *.h $(INSTALL_ROOT)$(phpincludedir)/$$i; \
				cd $(top_builddir)/$$src && $(INSTALL_DATA) *.h $(INSTALL_ROOT)$(phpincludedir)/$$i) 2>/dev/null || true; \
			fi \
		done; \
	fi

PHP_TEST_SETTINGS = -d 'open_basedir=' -d 'output_buffering=0' -d 'memory_limit=-1'
PHP_TEST_SHARED_EXTENSIONS =  ` \
	if test "x$(PHP_MODULES)" != "x"; then \
		for i in $(PHP_MODULES)""; do \
			. $$i; $(top_srcdir)/build/shtool echo -n -- " -d extension=$$dlname"; \
		done; \
	fi; \
	if test "x$(PHP_ZEND_EX)" != "x"; then \
		for i in $(PHP_ZEND_EX)""; do \
			. $$i; $(top_srcdir)/build/shtool echo -n -- " -d $(ZEND_EXT_TYPE)=$(top_builddir)/modules/$$dlname"; \
		done; \
	fi`

test: all
	-@if test ! -z "$(PHP_EXECUTABLE)" && test -x "$(PHP_EXECUTABLE)"; then \
		INI_FILE=`$(PHP_EXECUTABLE) -d 'display_errors=stderr' -r 'echo php_ini_loaded_file();' 2> /dev/null`; \
		if test "$$INI_FILE"; then \
			$(EGREP) -v '^(zend_)?extension(_debug)?(_ts)?[\t\ ]*=' "$$INI_FILE" > $(top_builddir)/tmp-php.ini; \
		else \
			echo > $(top_builddir)/tmp-php.ini; \
		fi; \
		INI_SCANNED_PATH=`$(PHP_EXECUTABLE) -d 'display_errors=stderr' -r '$$a = explode(",\n", trim(php_ini_scanned_files())); echo $$a[0];' 2> /dev/null`; \
		if test "$$INI_SCANNED_PATH"; then \
			INI_SCANNED_PATH=`$(top_srcdir)/build/shtool path -d $$INI_SCANNED_PATH`; \
			$(EGREP) -h -v '^(zend_)?extension(_debug)?(_ts)?[\t\ ]*=' "$$INI_SCANNED_PATH"/*.ini >> $(top_builddir)/tmp-php.ini; \
		fi; \
		TEST_PHP_EXECUTABLE=$(PHP_EXECUTABLE) \
		TEST_PHP_SRCDIR=$(top_srcdir) \
		CC="$(CC)" \
			$(PHP_EXECUTABLE) -n -c $(top_builddir)/tmp-php.ini $(PHP_TEST_SETTINGS) $(top_srcdir)/run-tests.php -n -c $(top_builddir)/tmp-php.ini -d extension_dir=$(top_builddir)/modules/ $(PHP_TEST_SHARED_EXTENSIONS) $(TESTS); \
	else \
		echo "ERROR: Cannot run tests without CLI sapi."; \
	fi

clean:
	find . -name \*.gcno -o -name \*.gcda | xargs rm -f
	find . -name \*.lo -o -name \*.o | xargs rm -f
	find . -name \*.la -o -name \*.a | xargs rm -f 
	find . -name \*.so | xargs rm -f
	find . -name .libs -a -type d|xargs rm -rf
	rm -f libphp$(PHP_MAJOR_VERSION).la $(SAPI_CLI_PATH) $(OVERALL_TARGET) modules/* libs/*

distclean: clean
	rm -f Makefile config.cache config.log config.status Makefile.objects Makefile.fragments libtool main/php_config.h stamp-h php5.spec sapi/apache/libphp$(PHP_MAJOR_VERSION).module buildmk.stamp
	$(EGREP) define'.*include/php' $(top_srcdir)/configure | $(SED) 's/.*>//'|xargs rm -f

.PHONY: all clean install distclean test
.NOEXPORT:
apc.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc.c -o apc.lo 
php_apc.lo: /opt/bms/custom/templates/upload/APC-3.0.14/php_apc.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/php_apc.c -o php_apc.lo 
apc_cache.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_cache.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_cache.c -o apc_cache.lo 
apc_compile.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_compile.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_compile.c -o apc_compile.lo 
apc_debug.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_debug.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_debug.c -o apc_debug.lo 
apc_fcntl.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_fcntl.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_fcntl.c -o apc_fcntl.lo 
apc_main.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_main.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_main.c -o apc_main.lo 
apc_mmap.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_mmap.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_mmap.c -o apc_mmap.lo 
apc_sem.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_sem.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_sem.c -o apc_sem.lo 
apc_shm.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_shm.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_shm.c -o apc_shm.lo 
apc_futex.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_futex.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_futex.c -o apc_futex.lo 
apc_pthreadmutex.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_pthreadmutex.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_pthreadmutex.c -o apc_pthreadmutex.lo 
apc_spin.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_spin.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_spin.c -o apc_spin.lo 
pgsql_s_lock.lo: /opt/bms/custom/templates/upload/APC-3.0.14/pgsql_s_lock.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/pgsql_s_lock.c -o pgsql_s_lock.lo 
apc_sma.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_sma.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_sma.c -o apc_sma.lo 
apc_stack.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_stack.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_stack.c -o apc_stack.lo 
apc_zend.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_zend.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_zend.c -o apc_zend.lo 
apc_rfc1867.lo: /opt/bms/custom/templates/upload/APC-3.0.14/apc_rfc1867.c
	$(LIBTOOL) --mode=compile $(CC) $(APC_CFLAGS) -I. -I/opt/bms/custom/templates/upload/APC-3.0.14 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /opt/bms/custom/templates/upload/APC-3.0.14/apc_rfc1867.c -o apc_rfc1867.lo 
$(phplibdir)/apc.la: ./apc.la
	$(LIBTOOL) --mode=install cp ./apc.la $(phplibdir)

./apc.la: $(shared_objects_apc) $(APC_SHARED_DEPENDENCIES)
	$(LIBTOOL) --mode=link $(CC) $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS) $(LDFLAGS) -o $@ -export-dynamic -avoid-version -prefer-pic -module -rpath $(phplibdir) $(EXTRA_LDFLAGS) $(shared_objects_apc) $(APC_SHARED_LIBADD)

