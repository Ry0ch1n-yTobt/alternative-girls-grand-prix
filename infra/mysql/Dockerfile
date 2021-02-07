FROM mysql:8.0

ARG TZ=UTC
ENV TZ ${TZ}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone && chown -R mysql:root /var/lib/mysql/

RUN apt-get update -y && \
    apt-get install -y locales task-japanese vim && \
    echo "ja_JP.UTF-8 UTF-8" > /etc/locale.gen && \
    locale-gen && \
    update-locale LANG=ja_JP.UTF-8 \
    && echo "export LANG=ja_JP.UTF-8" >> ~/.bashrc \
    && sed -i -E 's/# (ja_JP.UTF-8)/\1/' /etc/locale.gen && locale-gen

ENV MYSQL_DATABASE=alternative_girls_grand_prix \
    MYSQL_USER=root \
    MYSQL_PASSWORD=root \
    MYSQL_ROOT_PASSWORD=root \
    TZ=Asia/Tokyo \
    LANG=ja_JP.UTF-8 \
    LANGUAGE=ja_JP:UTF-8 \
    LC_ALL=ja_JP.UTF-8

RUN { \
    echo '[mysqld]'; \
    echo 'character-set-server = utf8mb4'; \
    echo '[client]'; \
    echo 'default-character-set = utf8mb4'; \
    } > /etc/mysql/conf.d/charset.cnf

COPY ./my.cnf /etc/mysql/conf.d/my.cnf

CMD ["mysqld", "--character-set-server=utf8", "--collation-server=utf8_unicode_ci"]

RUN chmod 644 /etc/mysql/conf.d/my.cnf

EXPOSE 3306