FROM nginx:stable

COPY app-entrypoint.sh /usr/local/bin/
ENTRYPOINT ["/usr/local/bin/app-entrypoint.sh"]
CMD ["nginx", "-g", "daemon off;" ]
