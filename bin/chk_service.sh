#!/bin/sh

if pidof motion
then
  echo "Desactivar Motion"
else
  echo "Activar Motion"
fi

