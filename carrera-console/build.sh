#!/bin/bash

BASEDIR=$(dirname "$0")
cd ${BASEDIR}
WKDIR=`pwd`

cd ${BASEDIR}/carrera-console
rm -rf target

mvn clean package -Pdev -Dmaven.test.skip=true

cd ..
OUTPATH=${WKDIR}/output
rm -rf ${OUTPATH}/
mkdir -p ${OUTPATH}
cp control.sh ${OUTPATH}/
cp carrera-console/target/carrera.war ${OUTPATH}/
